<?php

namespace App\Http\Controllers;

use App\Http\Requests\RoomTypeRequest;
use App\Http\Services\RoomTypeService;
use Illuminate\Http\Request;

class AdminRoomTypeController extends Controller
{
    //
    protected $roomTypeService;

    public function __construct(RoomTypeService $roomTypeService)
    {
        $this->roomTypeService= $roomTypeService;
    }

    public function index(){
        $roomTypes = $this->roomTypeService->getAll();
        return view('layouts.admin.room-type.index', compact('roomTypes'));
    }

    public function edit($id){
        $roomType = $this->roomTypeService->getById($id);
        return view('layouts.admin.room-type.form-edit',compact('roomType'));
    }
    public function store(RoomTypeRequest $roomTypeRequest,$id){
        $roomType = $this->roomTypeService->getById($id);
        $this->roomTypeService->update($roomTypeRequest, $roomType);
        return redirect()->route('roomType.admin.index');
    }

    public function destroy($id){
        $roomType = $this->roomTypeService->getById($id);
        
        $this->roomTypeService->destroy($roomType);
        return redirect()->route('roomType.admin.index');
    }
}
