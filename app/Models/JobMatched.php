<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobMatched extends Model
{
    use HasFactory;

    protected $table = 'job_matched';

    protected $fillable = [
        'location_match',
        'salary_match',
        'type_match',
        'skill_match_percent',
        'jobpost_id',
        'jobseeker_id',
    ];
}

