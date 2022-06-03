<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WebHook extends Model
{
    use HasFactory;
    protected $casts = [
        'types' => 'array'
    ];

    // public function setCategoryAttribute($value)
    // {
    //     $this->attributes['types'] = json_encode($value);
    // }

    // public function getCategoryAttribute($value)
    // {
    //     return $this->attributes['types'] = json_decode($value);
    // }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
