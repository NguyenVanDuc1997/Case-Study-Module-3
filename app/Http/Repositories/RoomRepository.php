<?php


namespace App\Http\Repositories;


use App\Room;
use App\RoomType;

class RoomRepository
{
    protected $connectModel;

    public function __construct(Room $room)
    {
        $this->connectModel = $room;
    }
}


