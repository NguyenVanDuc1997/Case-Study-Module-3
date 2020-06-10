<?php


namespace App\Http\Repositories;


use App\Room;

class RoomRepository
{
    protected $connectModel;

    public function __construct(Room $room)
    {
        $this->connectModel = $room;
    }
}
