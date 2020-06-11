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

    public function save($rooms)
    {
        $rooms->save();
    }

    public function findRoomById($id)
    {
        return $room = $this->connectModel->findOrFail($id);
    }

    public function getAllRoomType()
    {
        return $roomType = RoomType::all();
    }

    public function getAll()
    {
        return $this->connectModel->all();
    }
}


