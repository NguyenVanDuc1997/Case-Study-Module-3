<?php

namespace App\Http\Controllers;

use App\Http\Services\ReservationService;
use App\Http\Services\RoomTypeService;
use Illuminate\Http\Request;

class AdminReservationController extends Controller
{
    //
    protected $reservationService;
    protected $roomTypeService;

    public function __construct(ReservationService $reservationService, RoomTypeService $roomTypeService)
    {
        $this->reservationService = $reservationService;
        $this->roomTypeService = $roomTypeService;
    }

    public function index(){
        $reservations=$this->reservationService->getAll();
        return view('layouts.admin.reservation.index',compact('reservations'));
    }

    public function verify($id){

    }

    public function create()
    {
        $roomTypes = $this->roomTypeService->getAll();
        return view('layouts.admin.reservation.add', compact('roomTypes'));
    }
}
