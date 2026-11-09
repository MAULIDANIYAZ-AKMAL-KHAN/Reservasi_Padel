<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Court extends Model
{
    use HasFactory;

    // Kolom yang diizinkan untuk diisi
    protected $fillable = [
        'name',
        'type',
        'price_per_hour',
        'description',
        'image',
    ];

    // Relasi: Satu lapangan dapat memiliki banyak detail transaksi (hasMany)
    public function bookingDetails()
    {
        return $this->hasMany(BookingDetail::class);
    }
}

