<?php

namespace App\Models;

use App\Models\JobPosts;
use App\Models\Jobseeker;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Skills extends Model
{
    use HasFactory;

    protected $table = 'skills';

    protected $fillable = ['skill_name'];

    public function jobposts()
    {
        return $this->hasMany(JobPosts::class, 'skill_id');
    }

    public function jobseekers()
    {
        return $this->belongsToMany(Jobseeker::class, 'jobseeker_skills', 'skill_id', 'jobseeker_id');
    }
}

