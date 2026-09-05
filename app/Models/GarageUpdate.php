<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GarageUpdate extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'author',
        'date_str',
        'summary',
        'content',
    ];
}
