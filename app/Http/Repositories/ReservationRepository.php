<?php


namespace App\Http\Repositories;


use App\Reservation;
use Illuminate\Support\Facades\DB;

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


    public function getAll()
    {
        return $this->reservation->all();
    }

    public function getBookedReservationByRoomTypeAndDay($roomType, $checkIn, $checkOut)
    {

//        return $this->reservation->where('room_type_id', $request->input('room'))
//            ->where('check_in', '>=', $request->input('check_in_date'))
//            ->where('check_in', '<=', $request->input('check_out_date'))
//            ->orWhere('check_out', '>=', $request->input('check_in_date'))
//            ->where('check_out', '<=', $request->input('check_out_date'))
//            ->where('room_type_id', $request->input('room'))

        return $this->reservation->where('room_type_id', $roomType)
            ->where('check_in', '>=', $checkIn)
            ->where('check_in', '<=', $checkOut)
            ->orWhere('check_out', '>=', $checkIn)
            ->where('room_type_id', $roomType)
            ->where('check_out', '<=', $checkOut)
            ->get();
    }

    public function getById($id)
    {
        return $this->reservation->findOrFail($id);
    }

    public function destroy($reservation){
        $reservation->delete();
    }
}
