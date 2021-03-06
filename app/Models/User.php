<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

use Illuminate\Contracts\Auth\CanResetPassword;
use Illuminate\Notifications\Notifiable;


class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $guarded = [];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function applicants()
    {
        return $this->hasMany(Applicant::class);
    }

    public function kycLevels()
    {
        return $this->hasMany(KycLevel::class);
    }

    public function userProfile()
    {
        return $this->hasOne(UserProfile::class);
    }

    public function accountDetail()
    {
        return $this->hasOne(AccountDetail::class);
    }

    public function twilio()
    {
        return $this->hasOne(TwilioIntegration::class);
    }

    public function webHooks()
    {
        return $this->hasMany(WebHook::class);
    }
}
