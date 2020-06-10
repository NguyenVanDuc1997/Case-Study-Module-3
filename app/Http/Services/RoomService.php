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
        $this->connectRepository->save($room);
    }

    public function findRoomType($id)
    {
        return $this->connectRepository->findRoomTypeById($id);
    }

    public function getAllRoomType()
    {
        return $this->connectRepository->getAllRoomType();
    }

    public function update($roomRequest, $room)
    {
        $room->name = $roomRequest->name;
        $room->type = $roomRequest->type;
        $this->connectRepository->save($room);
    }
}
