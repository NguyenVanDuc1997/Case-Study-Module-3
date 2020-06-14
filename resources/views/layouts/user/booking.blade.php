@extends('layouts.user.master')
@section('content')
    <div class="hero-wrap" style="background-image: url({{asset('images/bg_1.jpg')}});">
        <div class="overlay"></div>
        <div class="container">
            <div class="row no-gutters slider-text d-flex align-itemd-end justify-content-center">
                <div class="col-md-9 ftco-animate text-center d-flex align-items-end justify-content-center">
                    <div class="text">
                        <h1 class="mb-4 bread">Booking</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
{{--@dd($checkInDate)--}}
    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-md-center">
                <form action="{{route('booking.store')}}" method="post">
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
                        <label for="room">Room</label>
                        <select name="room" id="room" class="form-control">
                            @foreach($roomTypes as $roomType)
                                <option value="{{$roomType->id}}" <?php if ($roomTypeId== $roomType->id) {
                                    echo "selected";
                                }?>>{{$roomType->name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label>Check-in</label>
                            <input type="date" name="check_in_date" value="{{$checkInDate}}" class="form-control"
                                   placeholder="Check-in date" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label>Check-out</label>
                            <input type="date" name="check_out_date" value="{{$checkOutDate}}" class="form-control"
                                   placeholder="Check-out date" required>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Book</button>
                </form>
            </div>
        </div>
    </section>
@endsection
