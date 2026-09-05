<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $fillable = [
        'number_code',
        'title',
        'slug',
        'category',
        'tag',
        'description',
        'price',
        'icon',
        'image',
    ];

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }
}
