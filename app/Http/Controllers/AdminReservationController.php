<?php

namespace App\Http\Controllers;

use App\Http\Services\ReservationService;
use Illuminate\Http\Request;

class AdminReservationController extends Controller
{
    //
    protected $reservation;

    public function __construct(ReservationService $reservation)
    {
        $this->reservation = $reservation;
    }

    public function index(){
        $reservations=$this->reservation->getAll();
        return view('layouts.admin.reservation.index',compact('reservations'));
    }

    public function verify($id){

    }
}
