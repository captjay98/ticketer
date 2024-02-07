<?php

namespace App\Models;

use Illuminate\Support\Str;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\belongsTo;

class Ticket extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'seat_id',
        'ticket_type_id',
        'trip_id',
        'qr_code',
        'serial_number',
        'expires_at',
    ];


    protected static function boot()
    {
        parent::boot();

        static::creating(function ($ticket) {
            $ticket->serial_number = Str::uuid();
        });
    }

    public function user(): belongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function seat(): belongsTo
    {
        return $this->belongsTo(Seat::class);
    }

    public function ticketType(): belongsTo
    {
        return $this->belongsTo(TicketType::class);
    }

    public function trip(): belongsTo
    {
        return $this->belongsTo(Trip::class);
    }
}
