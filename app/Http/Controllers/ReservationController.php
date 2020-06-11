<?php

namespace App\Http\Controllers;

use App\Http\Services\ReservationService;
use App\Http\Services\RoomTypeService;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    protected $reservationService;
    protected $roomTypeService;

    public function __construct(ReservationService $reservationService, RoomTypeService $roomTypeService)
    {
        $this->reservationService = $reservationService;
        $this->roomTypeService = $roomTypeService;
    }

    public function showFormBooking(Request $request)
    {
        $checkInDate = $request->input('check_in_date');
        $checkOutDate = $request->input('check_out_date');
        $roomTypeId = $request->input('room_type');
        $roomTypes = $this->roomTypeService->getAll();
        return view('layouts.user.booking', compact(['checkInDate', 'checkOutDate', 'roomTypeId', 'roomTypes']));
    }
}
