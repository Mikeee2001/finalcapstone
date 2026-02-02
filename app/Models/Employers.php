<?php

namespace App\Models;

use App\Models\User;
use App\Models\CompanyDetails;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Employers extends Model
{
    use HasFactory;

    protected $table = 'employers';

    protected $fillable = [
        'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function companyDetails()
    {
        return $this->hasOne(CompanyDetails::class, 'employer_id');
    }
}
