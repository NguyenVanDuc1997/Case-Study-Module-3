<?php


namespace App\Http\Services;


use App\Http\Repositories\RoomTypeRepository;

class RoomTypeService
{
    protected $roomTypeRepository;

    public function __construct(RoomTypeRepository $roomTypeRepository)
    {
        $this->roomTypeRepository = $roomTypeRepository;
    }

    public function getAll()
    {
        return $this->roomTypeRepository->getAll();
    }

    public function getById($id)
    {

    }

}
