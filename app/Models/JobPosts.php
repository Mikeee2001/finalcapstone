<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobPosts extends Model
{
    use HasFactory;

    protected $table = 'job_posts';

    protected $fillable = [
        'title',
        'description',
        'location',
        'salary_min',
        'salary_max',
        'job_type',
        'date_posted',
        'company_id',
    ];

    public function skills()
    {
        return $this->belongsToMany(Skills::class, 'job_post_skills', 'job_post_id', 'skill_id');
    }
}

