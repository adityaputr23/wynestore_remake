<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorkshopQueue extends Model
{
    use HasFactory;

    protected $fillable = [
        'queue_code',
        'booking_id',
        'bike_name',
        'stage',
        'progress_percent',
        'mechanic_in_charge',
        'estimated_completion',
        'status',
    ];

    public function booking()
    {
        return $this->belongsTo(Booking::class);
    }
}
