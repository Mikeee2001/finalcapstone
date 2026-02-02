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
}
    
