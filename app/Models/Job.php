<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    protected $table = 'cleaning_jobs';

    protected $fillable = [
        'title',
        'job_category_id',
        'recruiter_id',
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

    public function creator()
    {
        return $this->belongsTo(User::class, 'recruiter_id');
    }
}
