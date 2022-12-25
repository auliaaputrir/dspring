<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;
    protected $fillable = ['reservations_id', 'total', 'image'];

    public function reservations(){
        return $this->belongsTo(Reservation::class);
    }
}
