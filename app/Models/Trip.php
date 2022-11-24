<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trip extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'date',
        'time',
    ];

    public function user()
    {
        return $this->belongsToMany(
            User::class,
            'user_trip',
            'trip_id',
            'user_id'
        );
    }
}
