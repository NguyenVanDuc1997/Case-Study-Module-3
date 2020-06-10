<?php


namespace App\Http\Services;


use App\Http\Repositories\RoomRepository;
use App\Room;

class RoomService
{
    protected $connectRepository;

    public function __construct(RoomRepository $roomRepository)
    {
        $this->connectRepository = $roomRepository;
    }

    public function createRoom($request)
    {
        $room = new Room();
        $room->name = $request->name;
        $room->room_type_id = $request->type;
        $this->connectRepository->createRoom($room);
    }
}
