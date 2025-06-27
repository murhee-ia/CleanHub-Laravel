<?php

namespace App\Http\Controllers;

use App\Http\Resources\RecruiterResource;
use App\Models\Job;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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

    public function updateJob(Request $request, $jobID) {
        $validated = $request->validate([
            'application_status' => 'required|boolean',
        ]);

        $job = Job::findOrFail($jobID);

        if ($request->user()->id !== $job->job_recruiter_id) {
            return response()->json([
                'message' => 'Unauthorized',
                'job' => $job,
            ], 403);
        }

        $job->application_status = $validated['application_status'];
        $job->save();

        return response()->json([
            'message' => 'Application status updated successfully',
            'job' => $job,
        ], 200);

    }

    public function delete(Request $request) {
        return response()->json([
            'message' => "Sorry. You cannot delete posted jobs."
        ]);
    }

    public function saveTheJob(Request $request) {
        $user = $request->user();

        $validated = $request->validate([
            'saved' => 'array'
        ]);
        
        $newSavedJobs = array_map('intval', $validated['saved'] ?? []);
        $user->saved = $newSavedJobs;
        $user->save();

        return response()->json($user->fresh());
    }

    public function applyTheJob(Request $request, $jobID) {
        $user = $request->user();
        $job = Job::findOrFail($jobID);

        $job_application = DB::table('job_applications')->where('job_id', $jobID)->first();

        if ($job_application) {
            $applicants = json_decode($job_application->applicants ?? '[]', true);

            if (in_array($user->id, $applicants)) {
                return response()->json([
                    'message' => 'You have already applied for this job'
                ]);
            }

            $applicants[] = $user->id;
            DB::table('job_applications')
                ->where('job_id', $jobID)
                ->update([
                    'applicants' => json_encode($applicants),
                    'updated_at' => now(),
                ]);
        } else {
            DB::table('job_applications')->insert([
                'job_recruiter_id' => $job->job_recruiter_id,
                'job_id' => $jobID,
                'applicants' => json_encode([$user->id]),
                'chosen_applicants' => json_encode([]),
                'ratings' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        return response()->json(['message' => 'Job application successful'], 200);
    }
}
