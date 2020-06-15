<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Http\Services\CustomerService;
use App\Http\Services\ReservationService;
use App\Http\Services\RoomService;
use App\Http\Services\RoomTypeService;
use Illuminate\Http\Request;

class AdminReservationController extends Controller
{
    //
    protected $reservationService;

    protected $roomService;
    protected $roomTypeService;
    protected $customerService;

    public function __construct(
        ReservationService $reservationService,
        RoomService $roomService,
        RoomTypeService $roomTypeService,
        CustomerService $customerService
    ) {
        $this->reservationService = $reservationService;
        $this->roomService = $roomService;
        $this->roomTypeService = $roomTypeService;
        $this->customerService = $customerService;
    }

    public function index()
    {
        $reservations = $this->reservationService->getAll();
        $rooms = $this->roomService->getAllRoom();
        return view('layouts.admin.reservation.index', compact('reservations', 'rooms'));

    }

//    public function index(){
//        $reservations=$this->reservationService->getAll();
//        return view('layouts.admin.reservation.index',compact('reservations'));
//    }

    public function verify(Request $request, $reservationId)
    {
//        return response()->json($request->all());
//        $reservation = $this->reservationService->getById($reservationId);
//        $this->reservationService->verify($reservation);
        return redirect()->route('reservation.admin.index');
    }

    public function destroy($id)
    {
        $reservation = $this->reservationService->getById($id);
        $this->reservationService->destroy($reservation);
        return redirect()->route('reservation.admin.index');
    }

    public function create()
    {
        $roomTypes = $this->roomTypeService->getAll();
        $rooms = $this->roomService->getAllRoom();
        return view('layouts.admin.reservation.add', compact('roomTypes', 'rooms'));
    }

    public function store(Request $request)
    {

        $customerId = $this->customerService->store($request);

        $rooms = $this->roomTypeService->getAllRoomsByRoomTypeId($request);
        $this->reservationService->store($request, $customerId, $rooms);
        if (isset($availableRoomsId)) {
            toastr()->error('Out of room');
            return redirect()->route('reservation.admin.create');
        }
        toastr()->success('Your reservation has been successfully sent to the administrator.');
        return redirect()->route('reservation.admin.index');
    }
}
