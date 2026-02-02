<?php

namespace App\Models;

use App\Models\CompanyDetails;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CompanyRatings extends Model
{
    use HasFactory;
    protected $table = 'company_ratings';

    protected $fillable = [
        'rating',
        'review',
        'company_id',
        'jobseeker_id',
    ];

    public function companydetails()
    {
        return $this->belongsTo(CompanyDetails::class, 'company_id');
    }
}

