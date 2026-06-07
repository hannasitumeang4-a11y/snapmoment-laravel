<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    // Nama tabel di database
    protected $table = 'bookings';

    // Kolom yang boleh diisi (mass assignable)
    protected $fillable = [
        'user_id',
        'package_name',
        'total_price',
        'payment_method',
        'payment_proof',
        'status',
    ];

    /**
     * Relasi ke User (Satu booking dimiliki oleh satu user)
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}