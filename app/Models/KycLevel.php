<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KycLevel extends Model
{
    use HasFactory;

    protected $fillable= ['id_types'];
    protected $casts = [
    'id_types' => 'array'
];
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function applicants()
    {
        return $this->hasMany(Applicant::class);
    }
}
