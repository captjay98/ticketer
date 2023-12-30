<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'booking_id',
        'transaction_ref',
        'authorization_code',
        'status',
        'amount',
        'currency',
        'metadata',
    ];

    public function booking()
    {
        return $this->belongsTo(Booking::class);
    }

    // Example method for generating a unique serial number
    public static function generateUniqueSerialNumber()
    {
        // Implement your logic for generating a unique serial number
        // Consider using a combination of timestamps, random numbers, and/or a sequence generator
    }
}
