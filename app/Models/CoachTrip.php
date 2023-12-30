<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CoachTrip extends Model
{
    use HasFactory;


    protected $fillable = [
    'trip_id',
    'coach_id'
    ];


    public function trip()
    {
        $this->belongsTo(Trip::class);
    }

    public function coaches()
    {
        $this->belongsToMany(Coach::class);
    }
}
