<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;
    protected $fillable = ['rooms_id', 'user_id', 'period', 'stay_date', 'reservation_status'];
    public function rooms(){
        return $this->belongsTo(Room::class);

    }
    public function users(){
        return $this->belongsTo(Rent::class);

    }
    public function payments(){
        return $this->hasMany(Payment::class);
    }
}
