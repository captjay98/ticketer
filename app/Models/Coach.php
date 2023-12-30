<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coach extends Model
{
    use HasFactory;

    protected $fillable = [
        'coach_name',
        'coach_class',
        'capacity',
        'is_active',
    ];

    public function trips()
    {
        return $this->belongsToMany(Trip::class, 'coach_trips')->withTimestamps();
    }

    public function seats()
    {
        return $this->hasMany(Seat::class);
    }
}
