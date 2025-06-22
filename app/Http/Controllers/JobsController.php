<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;
use App\Http\Resources\RecruiterResource;

class JobsController extends Controller
{
    public function getAllJobs(Request $request) {
        $category = $request->query('category', null);
        $search = $request->query('search', null);

        $query = Job::with(['job_recruiter', 'job_category'])
            ->where('approved_status', 1)
            ->where('application_status', 1);

        if ($category) {
            $query->where('job_category_id', $category);
        }

        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('title', 'LIKE', "%$search%")
                ->orWhere('description', 'LIKE', "%$search%")
                ->orWhere('qualifications', 'LIKE', "%$search%")
                ->orWhere('city', 'LIKE', "%$search%")
                ->orWhere('full_address', 'LIKE', "%$search%")
                ->orWhere('schedule', 'LIKE', "%$search%")
                ->orWhere('payment', 'LIKE', "%$search%")
                ->orWhereHas('recruiter', function($q) use ($search) {
                    $q->where('name', 'LIKE', "%$search%");
                });
            });
        };

        $jobs = $query->orderBy('created_at', 'desc')->get()
            ->map(function($job) {
                $job = $job->toArray();
                $job['job_category'] = $job['job_category']['title'];
                $job['job_recruiter'] = new RecruiterResource($job['job_recruiter']);
                unset($job['job_category_id']);
                unset($job['job_recruiter_id']);
                return ($job);
            });

        return response()->json($jobs);
    }
}
