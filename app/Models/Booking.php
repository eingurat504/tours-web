<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $casts = [
        'activity_ids' => 'array'
    ];

    public function payments()
    {
        return $this->hasMany(Payment::class);
    }
}
