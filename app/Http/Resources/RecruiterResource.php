<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class RecruiterResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this['id'],
            'full_name' => $this['full_name'],
            'user_name' => $this['user_name'],
            'email' => $this['email'],
            'profile_picture' => $this['profile_picture'],
        ];
    }
}
