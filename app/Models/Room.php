<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;
    protected $fillable = ['room_number', 'floor_number', 'description', 'room_status'];
    public function reservations()
    {
        return $this->hasOne(Reservation::class);
    }
}
