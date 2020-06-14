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


    public function getAll(){
        return DB::table('reservations')
            ->join('customers', 'customers.id', '=', 'reservations.customer_id')
            ->join('rooms','rooms.id','=','reservations.room_id')
            ->join('room_types','room_types.id','=','rooms.room_type_id')
            ->get();
    }

    public function getBookedReservationByRoomTypeAndDay($roomType, $checkIn, $checkOut)
    {
        return $this->reservation->where('room_type_id', $roomType)
            ->where('check_in', '>=', $checkIn)
            ->where('check_in', '<=', $checkOut)
            ->orWhere('check_out', '>=', $checkIn)
            ->where('room_type_id', $roomType)
            ->where('check_out', '<=', $checkOut)
            ->get();
    }
}
