<?php

namespace App\Http\Controllers;

use App\Http\Requests\RoomTypeRequest;
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

    public function indexAdminPage(){
        $roomTypes = $this->roomTypeService->getAll();
        return view('layouts.admin.room-type.index', compact('roomTypes'));
    }

    public function editAdminPage($id){
        $roomType = $this->roomTypeService->getById($id);
        return view('layouts.admin.room-type.form-edit',compact('roomType'));
    }
    public function storeAdminPage(RoomTypeRequest $roomTypeRequest,$id){
        $roomType = $this->roomTypeService->getById($id);
        $this->roomTypeService->update($roomTypeRequest, $roomType);
        return redirect()->route('roomType.index');
    }

    public function getById($id)
    {
        $room = $this->roomTypeService->getById($id);
        return view('layouts.user.rooms.detail', compact('room'));

    }

    public function destroyAdminPage($id){
        $roomType = $this->roomTypeService->getById($id);
        $this->roomTypeService->destroy($roomType);
        return redirect()->route('roomType.index');
    }

    public function showFormCreate()
    {
        return view('layouts.admin.room-type.form-create');
    }

    public function create()
    {

    }

}
