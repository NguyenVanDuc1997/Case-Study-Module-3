@extends('layouts.admin.master')
@section('content')

    <div class="container-fluid">
        <ol class="breadcrumb mb-4 mt-4">
            <li class="breadcrumb-item"><a href="">Dash</a></li>
            <li class="breadcrumb-item"><a href="">Reservation</a></li>
            <li class="breadcrumb-item active">List</li>
        </ol>

        <div class="card mb-4">
            <div class="card-body">
                <div class="col-md-12">
                    <div class="row">
                        <form class="col-md-8" action="{{route('reservation.admin.store')}}" method="POST">
                            @csrf
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="last_name">Last name</label>
                                    <input type="text" name="last_name" class="form-control" id="last_name" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="first_name">First name</label>
                                    <input type="text" name="first_name" class="form-control" id="first_name" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="phone">Phone</label>
                                <input type="text" class="form-control" id="phone" name="phone" required>
                            </div>
                            <div class="form-group">
                                <label for="personal_id">Personal id</label>
                                <input type="text" class="form-control" id="personal_id" name="personal_id" required>
                            </div>

                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" id="email" name="email" required>
                            </div>

                            <div class="form-group">
                                <label for="room">Room type</label>
                                <select name="room_type" id="room" class="form-control" required>
                                    @foreach($roomTypes as $roomType)
                                        <option value="{{$roomType->id}}">{{$roomType->name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="room_id">Room</label>
                                <select name="room_id" id="room_id" class="form-control" required>
                                    @foreach($rooms as $room)
                                        <option value="{{$room->id}}">{{$room->name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label>Check-in</label>
                                    <input type="date" name="check_in_date" value="{{date('Y-m-d')}}"
                                           class="form-control"
                                           placeholder="Check-in date" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Check-out</label>
                                    <input type="date" name="check_out_date" value="{{date('Y-m-d')}}"
                                           class="form-control"
                                           placeholder="Check-out date" required>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Book</button>
                        </form>
                    </div>
                </div>


            </div>
        </div>
    </div>

    @toastr_render


    {{--    <section class="ftco-section">--}}

    {{--          --}}
    {{--       --}}
    {{--    </section>--}}
    <script>
        $(document).ready(function () {
            $.ajax({
                url: 'case-study-module-3/booking',
                type: 'GET',

            })

        })
    </script>
@endsection
