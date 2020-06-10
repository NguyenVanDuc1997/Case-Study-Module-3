<?php

namespace App\Http\Controllers;

use App\Http\Services\RoomTypeService;
use App\RoomType;
use Illuminate\Http\Request;

class RoomTypeController extends Controller
{
    protected $roomTypeService;

    public function __construct(RoomTypeService $roomTypeService)
    {
        $this->roomTypeService = $roomTypeService;
    }

    public function index()
    {
        $roomTypes = $this->roomTypeService->getAll();
        return view('layouts.user.rooms.list', compact('roomTypes'));
    }

    public function getById($id)
    {
        $room = $this->roomTypeService->getById($id);
        return view('layouts.user.rooms.detail', compact('room'));

    }

}
