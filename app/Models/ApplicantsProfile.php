<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ApplicantsDocument;

class ApplicantsProfile extends Model
{
    use HasFactory;

    public function applicant()
    {
        return $this->belongsTo(Applicant::class);
    }

    public function applicantsDocuments()
    {
        return $this->hasMany(ApplicantsDocument::class);
    }
}
