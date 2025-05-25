<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;

class JobController extends Controller
{
    public function getTheJob(Request $request) {
        $jobID = $request->query('job_id');
        $job = Job::with('recruiter')->findOrFail($jobID);
        $job['category'] = $job->job_category->title;
        $job = $job->toArray();
        $job['recruiter'] = [
            'id' => $job['recruiter']['id'],
            'full_name' => $job['recruiter']['full_name'],
            'user_name' => $job['recruiter']['user_name'],
            'email' => $job['recruiter']['email'],
            'profile_picture' => $job['recruiter']['profile_picture'],
        ];
        unset($job['job_category']);
        unset($job['job_category_id']);
        unset($job['recruiter_id']);
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
            'media_paths.*' => 'file|mimes:jpg,jpeg,png|max:512000',
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
        $newJob->recruiter_id = $user->id;
        $newJob->save();

        return response(204);
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
}
