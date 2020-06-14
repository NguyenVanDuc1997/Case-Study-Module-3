<?php

namespace App\Http\Controllers;

use App\Http\Services\CustomerService;
use App\Http\Services\ReservationService;
use App\Http\Services\RoomTypeService;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    protected $reservationService;
    protected $roomTypeService;
    protected $customerService;

    public function __construct(ReservationService $reservationService, RoomTypeService $roomTypeService, CustomerService $customerService)
    {
        $this->reservationService = $reservationService;
        $this->roomTypeService = $roomTypeService;
        $this->customerService = $customerService;
    }

    public function showFormBooking(Request $request)
    {
        $checkInDate = $request->input('check_in_date');
        $checkOutDate = $request->input('check_out_date');
        $roomTypeId = $request->input('room_type');
        $roomTypes = $this->roomTypeService->getAll();
        return view('layouts.user.booking', compact(['checkInDate', 'checkOutDate', 'roomTypeId', 'roomTypes']));
    }

    public function store(Request $request)
    {
        $customerId = $this->customerService->store($request);
        $rooms = $this->roomTypeService->getAllRoomsByRoomTypeId($request);
        $this->reservationService->store($request, $customerId, $rooms);
        toastr()->success('Your reservation has been successfully sent to the administrator.');
        return redirect('/');
    }
}
