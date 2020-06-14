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
        return DB::table('reservations')
            ->join('customers', 'reservations.customer_id', '=', 'customers.id')
            ->join('rooms', 'reservations.room_id', '=', 'rooms.id')
            ->join('room_types', 'rooms.room_type_id', '=', 'room_types.id')
            ->get();
    }

    public function getBookedReservationByRoomTypeAndDay($request)
    {
        return $this->reservation->where('room_type_id', $request->input('room'))
            ->where('check_in', '>=', $request->input('check_in_date'))
            ->where('check_in', '<=', $request->input('check_out_date'))
            ->orWhere('check_out', '>=', $request->input('check_in_date'))
            ->where('check_out', '<=', $request->input('check_out_date'))
            ->where('room_type_id', $request->input('room'))
            ->get();
    }

    public function getById($id)
    {
        return $this->reservation->findOrFail($id);
    }
}
