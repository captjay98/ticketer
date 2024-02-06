<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trip extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'source',
        'destination',
        'seats',
        'date',
        'departure_time',
        'arrival_time',
    ];

    public function coaches()
    {
        return $this->belongsToMany(Coach::class, 'coach_trips');
    }

    public function ticketTypes()
    {
        return $this->HasMany(TicketType::class);
    }
}
