<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    // Kolom yang diizinkan untuk diisi
    protected $fillable = [
        'customer_name',
        'customer_phone',
        'booking_date',
        'total_price',
        'status',
    ];

    // Relasi: Satu transaksi booking memiliki banyak detail pesanan (hasMany)
    public function details()
    {
        return $this->hasMany(BookingDetail::class);
    }
}
