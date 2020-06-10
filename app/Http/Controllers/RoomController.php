<?php

namespace App\Http\Controllers;

use App\Http\Services\RoomService;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    protected $connectService;
    public function __construct(RoomService $roomService)
    {
        $this->connectService=$roomService;
    }
}
