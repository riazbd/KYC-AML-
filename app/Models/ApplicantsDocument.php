<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ApplicantsProfile;

class ApplicantsDocument extends Model
{
    use HasFactory;

    public function applicantsProfile()
    {
        return $this->belongsTo(ApplicantsProfile::class);
    }
}
