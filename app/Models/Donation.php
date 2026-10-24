<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Donation extends Model
{
    use HasFactory;

    protected $fillable = [
        'donor_name',
        'donor_email',
        'donor_phone',
        'amount',
        'method',
        'bank_name',
        'reference',
        'status',
        'donated_at',
        'confirmed_at',
        'message',
    ];

    protected $casts = [
        'amount' => 'decimal:2',
        'donated_at' => 'datetime',
        'confirmed_at' => 'datetime',
    ];
}
