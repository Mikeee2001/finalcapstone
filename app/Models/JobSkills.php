<?php

namespace App\Models;

use App\Models\JobPosts;
use App\Models\Skills;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobSkills extends Model
{
    use HasFactory;

    protected $table = 'job_skills';

    protected $fillable = [
        'job_post_id',
        'skill_id',
    ];

    public function job_post()
    {
        return $this->belongsTo(JobPosts::class, 'job_posts_id');
    }

    public function skill()
    {
        return $this->belongsTo(Skills::class, 'skill_id');
    }
}


