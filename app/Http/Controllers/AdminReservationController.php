<?php

namespace App\Http\Controllers;

use App\Http\Services\ReservationService;
use Illuminate\Http\Request;

class AdminReservationController extends Controller
{
    //
    protected $reservationService;

    public function __construct(ReservationService $reservationService)
    {
        $this->reservationService = $reservationService;
    }

    public function index(){
        $reservations=$this->reservationService->getAll();
        return view('layouts.admin.reservation.index',compact('reservations'));
    }

    public function verify($id){
        $reservation= $this->reservationService->getById($id);
        $this->reservationService->verify($reservation);
        return redirect()->route('reservation.admin.index');
    }

    public function destroy($id){
        $reservation= $this->reservationService->getById($id);
        dd($reservation);
        $this->reservationService->destroy($reservation);
        return redirect()->route('reservation.admin.index');
    }
}
