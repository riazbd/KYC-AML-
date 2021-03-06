<?php

namespace App\Models;

use App\Models\ApplicantsProfile;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Applicant extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function applicantsProfile()
    {
        return $this->hasOne(ApplicantsProfile::class);
    }

    public function kycLevel()
    {
        return $this->belongsTo(KycLevel::class);
    }

}
