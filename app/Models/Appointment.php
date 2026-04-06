<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    protected $fillable = [
        'name', 'phone', 'email', 'service',
        'preferred_date', 'preferred_time', 'message', 'status',
    ];

    protected $casts = [
        'preferred_date' => 'date',
    ];
}
