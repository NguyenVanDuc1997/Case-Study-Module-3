<?php


namespace App\Http\Services;


use App\Http\Repositories\RoomRepository;

class RoomService
{
    protected $connectRepository;

    public function __construct(RoomRepository $roomRepository)
    {
        $this->connectRepository = $roomRepository;
    }

}