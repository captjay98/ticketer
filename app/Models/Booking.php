<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\belongsTo;
use League\CommonMark\Reference\Reference;

class Booking extends Model
{
    use HasFactory;
    protected $fillable = [
       'user_id',
       'seat_id',
       'trip_id',
       'ticket_id',
       'reference',
       'status',
    ];

    public function user(): belongsTo
    {
        return $this->belongsTo(User::class);
    }
    public function seat(): belongsTo
    {
        return $this->belongsTo(Seat::class);
    }
    public function trip(): belongsTo
    {
        return $this->belongsTo(Trip::class);
    }

    public function ticket(): belongsTo
    {
        return $this->belongsTo(Ticket::class);
    }

}
