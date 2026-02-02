<?php

namespace App\Models;

use App\Models\Employers;
use App\Models\CompanyRatings;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CompanyDetails extends Model
{
    use HasFactory;
    protected $table = 'company_details';

    protected $fillable =
    [
        'company_name',
        'company_address',
        'company_description',
        'employer_id'
    ];

    public function employer()
    {
        return $this->belongsTo(Employers::class, 'employer_id');
    }

    public function companyRatings()
    {
        return $this->hasMany(CompanyRatings::class, 'company_id');
    }
}
