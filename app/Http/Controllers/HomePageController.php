<?php

namespace App\Http\Controllers;

use App\Http\Services\RoomTypeService;
use Illuminate\Http\Request;

class HomePageController extends Controller
{
    protected $roomTypeService;

    public function __construct(RoomTypeService $roomTypeService)
    {
        $this->roomTypeService = $roomTypeService;
    }

    public function showHomePage()
    {
        $roomTypes = $this->roomTypeService->getAll();
        return view('layouts.user.home', compact('roomTypes'));
    }
}
