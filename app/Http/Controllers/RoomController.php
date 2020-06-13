<?php

namespace App\Http\Controllers;

use App\Http\Requests\RoomRequest;
use App\Http\Services\RoomService;
use App\Http\Services\RoomTypeService;
use App\RoomType;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    protected $connectService;
    protected $roomTypeService;
    public function __construct(RoomService $roomService,RoomTypeService $roomTypeService)
    {
        $this->connectService = $roomService;
        $this->roomTypeService= $roomTypeService;
    }

    public function showFormCreate()
    {
        $roomTypes = $this->roomTypeService->getAll();
        return view('layouts.admin.room.form-create',compact('roomTypes'));
    }

    public function create(RoomRequest $roomRequest)
    {
        $this->connectService->createRoom($roomRequest);
        toastr()->success('Create Successfully!');
        return redirect()->route('room.index');
    }

    public function edit($id)
    {
        $roomType = $this->connectService->findRoom($id);
        $allRoomType = $this->connectService->getAllRoomType();
        return view('layouts.admin.room.form-edit', compact('roomType', 'allRoomType'));
    }

    public function change(RoomRequest $roomRequest, $id)
    {
        $room = $this->connectService->findRoom($id);
        $this->connectService->update($roomRequest, $room);
        return redirect()->route('room.index');
    }

    public function delete($id)
    {
        $this->connectService->deleteRoom($id);
        toastr()->warning('Delete Success!');
        return back();
    }

    public function index()
    {
        $room = $this->connectService->getAllRoom();
        return view('layouts.admin.room.index',compact('room'));
    }
}
