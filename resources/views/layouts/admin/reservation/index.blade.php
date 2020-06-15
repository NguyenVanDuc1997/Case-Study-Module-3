@extends('layouts.admin.master');
@section('content')

    <div class="container-fluid">
        <ol class="breadcrumb mb-4 mt-4">
            <li class="breadcrumb-item"><a href="">Dash</a></li>
            <li class="breadcrumb-item"><a href="">Reservation</a></li>
            <li class="breadcrumb-item active">List</li>
        </ol>
        <div class="card mb-4">
            <div class="card-body">
{{--                <div class="card-header"> <a href="" class="btn btn-success">Create</a></div>--}}
                <table class="table table-bordered clone2" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>STT</th>
                        <th>Booking Code</th>
                        <th>Customer</th>
                        <th>Room Id</th>
                        <th>Check In</th>
                        <th>Check Out</th>
                        <th>Status</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tfoot id="data-users">
                    @foreach($reservations as $key => $reservation)
                        <tr>
                            <td>{{ ++$key }}</td>
                            <td><a href="">Booking-{{ $reservation->id }}</a></td>
                            <td><a href="">KH-{{ $reservation->customer->id }}</a></td>
                            <td>
                                <select id="reservation-{{$reservation->id}}" class="form-control">
                                    @foreach($rooms as $room)
                                        <option value="{{$room->id}}">{{$room->id.'-'.$room->name}}</option>
                                    @endforeach
                                </select>
                            </td>
                            <td>{{ $reservation->check_in}}</td>
                            <td>{{ $reservation->check_out}}</td>

                            <td>
                                @if($reservation->status==\App\Http\Controllers\StatusReservationConstant::PENDING)
                                    Pending
                                    @elseif($reservation->status==\App\Http\Controllers\StatusReservationConstant::VERIFIED)
                                    <p class="text-success">Verified</p>
                                    @elseif($reservation->status==\App\Http\Controllers\StatusReservationConstant::UNVERIFIED)
                                    Unverified
                                @endif
                            </td>

                            <td>
                                <button class="btn btn-primary verify-booking" data-id="{{ $reservation->id }}">Verify</button>
                                <a href="{{route('reservation.admin.destroy',$reservation->id)}}" class="btn btn-danger">Delete</a>
                            </td>
                        </tr>
                    @endforeach
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
@endsection
