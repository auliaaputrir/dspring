<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;
    protected $fillable = ['room_id', 'user_id', 'period', 'stay_date', 'reservation_status'];
    public function rooms(){
        return $this->belongsTo(Room::class, 'room_id');

    }
    public function users(){
        return $this->belongsTo(User::class, 'user_id');

    }
    public function payments(){
        return $this->hasOne(Payment::class);
    }
}
