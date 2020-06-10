<?php

namespace App\Http\Controllers;

use App\Http\Services\RoomService;
use App\RoomType;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    protected $connectService;

    public function __construct(RoomService $roomService)
    {
        $this->connectService = $roomService;
    }

    public function showFormCreate()
    {
        return view('room.form-create');
    }

    public function create(Request $request)
    {
        $this->connectService->createRoom($request);
        return view('layouts.admin.home');
    }
}
