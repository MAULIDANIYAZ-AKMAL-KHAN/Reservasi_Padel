<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookingDetail extends Model
{
    use HasFactory;

    // Kolom yang diizinkan untuk diisi
    protected $fillable = [
        'booking_id',
        'court_id',
        'start_time',
        'duration_hours',
        'subtotal',
    ];

    // Relasi balik ke tabel bookings (belongsTo)
    public function booking()
    {
        return $this->belongsTo(Booking::class);
    }

    // Relasi balik ke tabel courts (belongsTo)
    public function court()
    {
        return $this->belongsTo(Court::class);
    }
}
