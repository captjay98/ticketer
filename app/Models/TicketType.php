<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\belongsTo;

class TicketType extends Model
{
    use HasFactory;
    protected $fillable = [
       'seat_class',
       'price',
       'trip_id',
    ];

    public function trip(): belongsTo
    {
        return $this->belongsTo(Trip::class);
    }

}
