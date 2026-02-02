<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobApplications extends Model
{
    use HasFactory;

    protected $table = 'job_applications';

    protected $fillable = [
        'job_post_id',
        'jobseeker_id',
        'status',
        'application_date',
    ];
}


