<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Room extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = "rooms";
    protected $dates = ['deleted_at'];
    protected $fillable = ['room_number', 'floor_number', 'price', 'description', 'room_status'];
    public function reservations()
    {
        return $this->hasMany(Reservation::class);
    }
}
