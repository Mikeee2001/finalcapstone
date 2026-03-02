<?php

namespace App\Models;

use App\Models\Employers;
use App\Models\Events;
use App\Models\Jobseeker;
use App\Notifications\EmployerVerifyEmail;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Auth\Notifications\VerifyEmail as DefaultVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'users';

    protected $fillable = [
        'full_name',
        'email',
        'role_as',
        'address',
        'password',
        'status',
        'email_verified_at',
    ];

    /**
     * Send the appropriate email verification notification.
     */
    public function sendEmailVerificationNotification()
    {
        if ($this->role_as === 'employer') {
            $this->notify(new EmployerVerifyEmail);
        } else {
            $this->notify(new DefaultVerifyEmail);
        }
    }

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function employer()
    {
        return $this->hasOne(Employers::class, 'user_id');
    }

    public function jobseeker()
    {
        return $this->hasOne(Jobseeker::class, 'user_id');
    }

    public function events()
    {
        return $this->hasMany(Events::class, 'user_id');
    }
}
