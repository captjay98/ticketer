<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seat extends Model
{
    use HasFactory;

    protected $fillable = [
        'seat_number',
        'coach_id',
        'trip_id',
        'status',
    ];
    public function coach()
    {
        return $this->belongsTo(Coach::class);
    }

    public function trip()
    {
        return $this->belongsTo(Trip::class);
    }


}
