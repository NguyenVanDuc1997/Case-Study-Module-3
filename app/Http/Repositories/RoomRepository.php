<?php


namespace App\Http\Repositories;


use App\Room;
use App\RoomType;
use function GuzzleHttp\Promise\all;

class RoomRepository
{
    protected $connectModel;

    public function __construct(Room $room)
    {
        $this->connectModel = $room;
    }

    public function createRoom($rooms)
    {
        $rooms->save();
    }

}


