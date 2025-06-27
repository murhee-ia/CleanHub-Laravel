<?php

namespace App\Http\Controllers;

use App\Http\Resources\RecruiterResource;
use App\Models\Job;
use Illuminate\Http\Request;

class JobController extends Controller
{
    public function getTheJob($jobID) {
        $job = Job::with(['job_recruiter', 'job_category'])->findOrFail($jobID);
        $job = $job->toArray();
        $job['job_category'] = $job['job_category']['title'];
        $job['job_recruiter'] = new RecruiterResource($job['job_recruiter']);
        unset($job['job_category_id']);
        unset($job['job_recruiter_id']);
        return response()->json($job);
    }

    public function createJob(Request $request) {
        $user = $request->user();
        $validated = $request->validate([
            'title' => 'required|max:225',
            'job_category_id' => 'required',
            'description' => 'required',
            'qualifications' => 'required',
            'city' => 'required',
            'full_address' => 'required',
            'schedule' => 'required',
            'payment' => 'required',
            'media_paths.*' => 'file|mimes:jpg,jpeg,png|max:10240',
        ]);

        $newJob = new Job();
        $newJob->title = $validated['title'];
        $newJob->job_category_id = $validated['job_category_id'];
        $newJob->description = $validated['description'];
        $newJob->qualifications = $validated['qualifications'];
        $newJob->city = $validated['city'];
        $newJob->full_address = $validated['full_address'];
        $newJob->schedule = $validated['schedule'];
        $newJob->payment = $validated['payment'];
        $newJob->job_recruiter_id = $user->id;

        $mediaPaths = [];
        if ($request->hasFile('media_paths')) {
            foreach ($request->file('media_paths') as $file) {
                $path = $file->store('job-media', 'public');
                $mediaPaths[] = asset('storage/' . str_replace('public/', '', $path));
            }
        }

        $newJob->media_paths = json_encode($mediaPaths);
        $newJob->save();

        return response()->json([
            'message' => 'Job posted successfully',
        ]);
    }

    public function updateJob(Request $request) {
        return response()->json([
            'message' => "Jobs posted already cannot be edited anymore."
        ]);
    }

    public function delete(Request $request) {
        return response()->json([
            'message' => "Sorry. You cannot delete posted jobs."
        ]);
    }

    public function saveJob(Request $request) {
        $user = $request->user();

        $validated = $request->validate([
            'saved' => 'array'
        ]);
        
        $newSavedJobs = array_map('intval', $validated['saved'] ?? []);
        $user->saved = $newSavedJobs;
        $user->save();

        return response()->json($user->fresh());
    }
}
