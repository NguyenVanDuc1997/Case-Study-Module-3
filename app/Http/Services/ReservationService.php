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
        $availableRoomsId = $this->getAvailableRooms($request, $rooms);
        $reservation = new Reservation();
        $customer_id = $id;
        $reservation->customer_id =$customer_id;
        $reservation->room_type_id = $request->input('room_type');
        $reservation->room_id = $availableRoomsId[0];
        $reservation->check_in = $request->input('check_in_date');
        $reservation->check_out = $request->input('check_out_date');
        $this->reservationRepository->store($reservation);
    }

    public function getAll(){
        return $this->reservationRepository->getAll();
    }

    public function getBookedReservationByRoomTypeAndDay($roomType, $checkIn, $checkOut)
    {
        return $this->reservationRepository->getBookedReservationByRoomTypeAndDay($roomType, $checkIn, $checkOut);
    }

    public function getAvailableRooms($request, $rooms)
    {
        $roomType = $request->input('room_type');
        $checkIn = $request->input('check_in_date');
        $checkOut = $request->input('check_out_date');
        $bookedReservations = $this->getBookedReservationByRoomTypeAndDay($roomType, $checkIn, $checkOut);
        $availableRoomsId = [];
        foreach ($rooms as $room) {
            array_push($availableRoomsId, $room->id);
        }
        if (count($bookedReservations) == 0) {
            return $availableRoomsId;
        } else {
            for ($i = 0; $i < count($availableRoomsId); $i++) {
                for ($j = 0; $j < count($bookedReservations); $j++) {
                    if ($availableRoomsId[$i] == $bookedReservations[$j]->room_id) {
                        array_splice($availableRoomsId, $i, 1);
                        $i--;
                        break;
                    }
                }
            }
            return $availableRoomsId;
        }
    }

}
