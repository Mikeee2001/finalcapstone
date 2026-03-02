<?php

namespace App\Models;

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

    public function jobseeker()
    {
        return $this->belongsTo(Jobseeker::class, 'jobseeker_id');
    }

    public function skill()
    {
        return $this->belongsTo(Skills::class, 'skill_id');
    }

}
