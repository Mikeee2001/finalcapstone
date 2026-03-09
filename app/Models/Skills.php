<?php

namespace App\Models;

use App\Models\JobseekersSkills;
use App\Models\JobSkills;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Skills extends Model
{
    use HasFactory;

    protected $table = 'skills';

    protected $fillable = [
        'skill_name',
    ];

    public function jobseekersSkills()
    {
        return $this->belongsToMany(JobseekersSkills::class, 'skill_id', 'jobseeker_id', 'jobseeker_skills' )->withTimestamps();
    }

    public function jobpostingsSkills()
    {
        return $this->hasMany(JobSkills::class, 'skill_id');
    }
}
