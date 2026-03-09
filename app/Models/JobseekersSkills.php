<?php

namespace App\Models;

use App\Models\Jobseeker;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobseekersSkills extends Model
{
    use HasFactory;

    protected $table = 'jobseeker_skills';

    protected $fillable = [
        'jobseeker_id',
        'skill_id',
    ];

    public function jobseekers()
    {
        return $this->belongsTo(Jobseeker::class);
    }

    public function skills()
    {
        return $this->belongsTo(Skills::class);
    }
}
