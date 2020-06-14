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
