<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JobCategory extends Model
{
    protected $fillable = [
        'title'
    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    public function jobs()
    {
        return $this->hasMany(Job::class, 'job_category_id');
    }
}
