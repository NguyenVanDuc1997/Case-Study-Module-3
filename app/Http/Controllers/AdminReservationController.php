<?php

namespace App\Http\Controllers;

use App\Http\Services\ReservationService;
use App\Http\Services\RoomService;
use Illuminate\Http\Request;

class AdminReservationController extends Controller
{
    //
    protected $reservationService;
    protected $roomService;

    public function __construct(ReservationService $reservationService, RoomService $roomService)
    {
        $this->reservationService = $reservationService;
        $this->roomService = $roomService;
    }

    public function index()
    {
        $reservations = $this->reservationService->getAll();
        $rooms= $this->roomService->getAllRoom();
        return view('layouts.admin.reservation.index', compact('reservations','rooms'));
    }

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
}
