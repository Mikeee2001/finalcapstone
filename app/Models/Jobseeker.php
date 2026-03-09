<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jobseeker extends Model
{
    use HasFactory;

    protected $table = 'jobseekers';

    protected $fillable = [
        'address',
        'expected_salary',
        'application_letter',
        'resume',
        'job_type',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function skills()
    {
        return $this->belongsToMany(Skills::class, 'jobseeker_skills', 'jobseeker_id', 'skill_id')
                    ->withTimestamps();
    }

}

