<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{

    public $timestamps = false;

    public function roomType()
    {
        return $this->belongsTo('App\RoomType');
    }

    public function reservations()
    {
        return $this->hasMany('App\Reservation');
    }
}
