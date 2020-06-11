<?php


namespace App\Http\Repositories;


use App\Reservation;

class ReservationRepository
{
    protected $reservation;

    public function __construct(Reservation $reservation)
    {
        $this->reservation = $reservation;
    }

}
