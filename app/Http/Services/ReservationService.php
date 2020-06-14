<?php


namespace App\Http\Services;


use App\Customer;
use App\Http\Repositories\ReservationRepository;
use App\Reservation;

class ReservationService
{
    protected $reservationRepository;

    public function __construct(ReservationRepository $reservationRepository)
    {
        $this->reservationRepository = $reservationRepository;
    }

    public function store($request, $id)
    {
        $reservation = new Reservation();
        $customer_id = $id;
        $reservation->customer_id =$customer_id;
        $reservation->room_id = 1;
        $reservation->check_in = $request->input('check_in_date');
        $reservation->check_out = $request->input('check_out_date');

        $this->reservationRepository->store($reservation);
    }

    public function getAll(){
        return $this->reservationRepository->getAll();
    }

}
