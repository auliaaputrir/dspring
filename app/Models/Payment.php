<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;
    protected $fillable = ['reservation_id', 'total', 'image']; #reservation_id bukan reservations_id

    public function reservations(){
        return $this->belongsTo(Reservation::class);
    }
}
