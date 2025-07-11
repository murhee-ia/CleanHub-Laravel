<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rules\Password;

class AuthenticationController extends Controller
{
    public function registerUser (Request $request) {
        $validated = $request->validate([
            'full_name' => 'required|max:255',
            'user_name' => 'required|max:60',
            'email' => 'required|email|unique:users',
            'password' => ['required','string','min:8','regex:/[A-Z]/','confirmed'],
        ]);

        try {
            $user = new User();
            $user->full_name = $validated['full_name'];
            $user->user_name = $validated['user_name'];
            $user->email = $validated['email'];
            $user->password = $validated['password'];
            $user->save();
        } catch (\Throwable $error) {
            return response(['message' => 'Failed to register user', $error], 500);
        }

        return response(['message' => 'Account has been succesfully created.'], 201);
    }

    public function loginUser (Request $request) {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
            'remember' => 'boolean'
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            return response(['message' => "Incorrect credentials"], 401);
        }

        $tokenExpiration = $request->remember ? null : now()->addDay();
        $token = $user->createToken($user->user_name, ['*'], $tokenExpiration);

        return response([
            'user' => $user->only([
                'full_name', 'user_name', 'role', 'profile_picture']),
            'token' => $token->plainTextToken,
            'tokenExpiration' => $tokenExpiration,
        ], 200);
    }

    public function logoutUser(Request $request) {
        $request->user()->tokens()->delete();
        return response(204);
    }

    public function refresh(Request $request) {
        $request->user()->tokens()->delete();
        $token = $request->user()->createToken($request->user()->user_name, ['*'], now()->addDay());

        return response(201)->json([
            'token' => $token->plainTextToken,
        ], 201)->withCookie('auth_token', $token->plainTextToken, null, '/', null, true, true, false, 'Strict');
    }

    public function updateUserPassword(Request $request) {
        $validated = $request->validate([
            'current_password' => ['required', 'current_password'],
            'password' => ['required', Password::defaults(), 'confirmed']
        ]);

        $user = $request->user();
        $user->password = Hash::make($validated['password']);
        $user->save();

        return response(204);
    }

    public function updateUserInfo(Request $request) {
        $user = $request->user();

        $field = $request->input('field');
        $value = $request->input('value');

        $request->validate([
            'field' => 'required|string|in:email,bio,location',
            'value' => 'required|string|max:225',
        ]);

        $user->{$field} = $value;
        $user->save();

        return response()->json($user);
    }

    public function updateProfilePicture(Request $request) {
        $user = $request->user();

        $request->validate([
            'profile_picture' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        // Delete old image if it exists
        if ($user->profile_picture && Storage::disk('public')->exists($user->profile_picture)) {
            Storage::disk('public')->delete($user->profile_picture);
        }

        // Store new image
        $path = $request->file('profile_picture')->store('profile_pictures', 'public');

        // Update user
        $user->profile_picture = Storage::url($path);
        $user->save();

        return response()->json($user);
    }

}
