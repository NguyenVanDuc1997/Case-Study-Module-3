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

    public function store($reservation)
    {
        $reservation->save();
    }

    public function getBookedReservationByRoomTypeAndDay($request)
    {
        return $this->reservation->where('room_type_id', $request->input('room'))
            ->where('check_in', '>=', $request->input('check_in_date'))
            ->where('check_in', '<=', $request->input('check_out_date'))
            ->orWhere('check_out', '>=', $request->input('check_in_date'))
            ->where('room_type_id', $request->input('room'))
            ->where('check_out', '<=', $request->input('check_out_date'))
            ->get();
    }
}
