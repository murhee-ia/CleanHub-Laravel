<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{

    protected $fillable = [
        'title',
        'job_category_id',
        'job_recruiter_id',
        'description',
        'qualifications',
        'city',
        'full_address',
        'schedule',
        'payment',
        'media_paths',
        'approved_status',
        'application_status',
        'rate_status',
    ];

    protected $casts = [
        'media_paths' => 'array',
    ];

    public function job_recruiter()
    {
        return $this->belongsTo(User::class, 'job_recruiter_id');
    }

    public function job_category()
    {
        return $this->belongsTo(JobCategory::class, 'job_category_id');
    }
}
