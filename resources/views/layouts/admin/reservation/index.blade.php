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
                        <th>Room Type</th>
                        <th>Full Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>ID Card</th>
                        <th>Status</th>
                    </tr>
                    </thead>
                    <tfoot id="data-users">
                    @foreach($reservations as $key => $reservation)
                        <tr>
                            <td>{{ ++$key }}</td>
                            <td>{{ $reservation->name }}</td>
                            <td>{{ $reservation->first_name.' '.$reservation->last_name}}</td>
                            <td>{{ $reservation->email}}</td>
                            <td>{{ $reservation->phone}}</td>
                            <td>{{ $reservation->personal_id}}</td>
                            <td>
                                @if($reservation->status==\App\Http\Controllers\StatusReservationConstant::PENDING)
                                    Pending
                                    @elseif($reservation->status==\App\Http\Controllers\StatusReservationConstant::VERIFIED)
                                    Verified
                                    @elseif($reservation->status==\App\Http\Controllers\StatusReservationConstant::UNVERIFIED)
                                    Unverified
                                @endif
                            </td>

                            <td>
                                <a href="{{route('reservation.admin.verify',$reservation->id)}}" class="btn btn-primary">Verify</a>
                                <a href="" class="btn btn-danger">Delete</a>
                            </td>
                        </tr>
                    @endforeach
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
@endsection
