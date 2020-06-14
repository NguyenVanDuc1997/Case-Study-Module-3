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
        array_push($availableRooms,$rooms);
        foreach ($rooms as $room) {
            foreach ($bookedReservations as $bookedReservation) {
                if ($room->id != $bookedReservation->room_id) {
                    array_push($availableRooms, $room);
                }
            }
        }

        $reservation = new Reservation();
        $customer_id = $id;
        $reservation->customer_id = $customer_id;
        $reservation->room_type_id = $request->input('room');
        $reservation->room_id = $availableRooms[0]->id;

        $reservation->check_in = $request->input('check_in_date');
        $reservation->check_out = $request->input('check_out_date');

        $this->reservationRepository->store($reservation);
    }

    public function getAll()
    {
        return $this->reservationRepository->getAll();
    }

}
