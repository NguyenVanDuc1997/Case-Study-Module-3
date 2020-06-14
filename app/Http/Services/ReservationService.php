<?php


namespace App\Http\Services;


use App\Customer;
use App\Http\Repositories\ReservationRepository;
use App\Reservation;
use App\RoomType;

class ReservationService
{
    protected $reservationRepository;

    public function __construct(ReservationRepository $reservationRepository)
    {
        $this->reservationRepository = $reservationRepository;
    }

    public function store($request, $id, $rooms)
    {
        $bookedReservations = $this->reservationRepository->getBookedReservationByRoomTypeAndDay($request);
        $availableRooms = [];
        if (count($bookedReservations) == 0) {
            $availableRooms = $rooms;
        } else {
            for ($i = 0; $i < count($rooms); $i++) {
                for ($j = 0; $j < count($bookedReservations); $j++) {
                    if ($rooms[$i]->id != $bookedReservations[$j]->room_id) {
                        array_push($availableRooms, $rooms[$i]);
                    }
                }
            }
        }
        $reservation = new Reservation();
        $customer_id = $id;
        $reservation->customer_id =$customer_id;
        $reservation->room_type_id = $request->input('room');
        $reservation->room_id = $availableRooms[0]->id;

        $reservation->check_in = $request->input('check_in_date');
        $reservation->check_out = $request->input('check_out_date');

        $this->reservationRepository->store($reservation);
    }

    public function getAll(){
        return $this->reservationRepository->getAll();
    }

}
