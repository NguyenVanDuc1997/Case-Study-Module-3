<?php


namespace App\Http\Repositories;


use App\RoomType;

class RoomTypeRepository
{
    protected $roomType;

    public function __construct(RoomType $roomType)
    {
        $this->roomType = $roomType;
    }

    public function getAll()
    {
        return $this->roomType->all();
    }

    public function find($id)
    {
        return $this->roomType->findOrFail($id);
    }
}
