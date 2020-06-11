<?php


namespace App\Http\Services;


use App\Http\Repositories\ReservationRepository;

class ReservationService
{
    protected $reservationRepository;

    public function __construct(ReservationRepository $reservationRepository)
    {
        $this->reservationRepository = $reservationRepository;
    }


}
