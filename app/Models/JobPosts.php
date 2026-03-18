<?php

namespace App\Models;

use App\Models\CompanyDetails;
use App\Models\Skills;
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
        'company_id',
        'status',
        'skill_id',
    ];
    public function skill()
    {
        return $this->belongsTo(Skills::class,'skill_id');
    }

    public function companyDetails()
    {
        return $this->belongsTo(CompanyDetails::class, 'company_id');
    }

}

