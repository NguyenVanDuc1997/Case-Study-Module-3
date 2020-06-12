@extends('layouts.user.master')
@section('content')
    <div class="hero-wrap" style="background-image: url({{asset('images/bg_1.jpg')}});">
        <div class="overlay"></div>
    </div>
x
    <section class="ftco-booking ftco-section ftco-no-pt ftco-no-pb">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 pr-1 aside-stretch">
                    <form action="{{route('booking.create')}}" method="get" class="booking-form">
                        <div class="row">
                            <div class="col-md d-flex py-md-4">
                                <div class="form-group align-self-stretch d-flex align-items-end">
                                    <div class="wrap bg-white align-self-stretch py-3 px-4">
                                        <label for="#">Check-in Date</label>
                                        <input type="date" name="check_in_date" class="form-control"
                                               placeholder="Check-in date">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md d-flex py-md-4">
                                <div class="form-group align-self-stretch d-flex align-items-end">
                                    <div class="wrap bg-white align-self-stretch py-3 px-4">
                                        <label for="#">Check-out Date</label>
                                        <input type="date" name="check_out_date" class="form-control"
                                               placeholder="Check-out date">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md d-flex py-md-4">
                                <div class="form-group align-self-stretch d-flex align-items-end">
                                    <div class="wrap bg-white align-self-stretch py-3 px-4">
                                        <label for="#">Room</label>
                                        <div class="form-field">
                                            <div class="select-wrap">
                                                <div class="icon"><span class="ion-ios-arrow-down"></span></div>
                                                <select name="room_type" id="" class="form-control">
                                                    @foreach($roomTypes as $roomType)
                                                        <option
                                                            value="{{$roomType->id}}" <?php if ($roomType->id == $room->id) {
                                                            echo "selected";
                                                        }?>>{{$roomType->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md d-flex py-md-4">
                                <div class="form-group align-self-stretch d-flex align-items-end">
                                    <div class="wrap bg-white align-self-stretch py-3 px-4">
                                        <label for="#">Guests</label>
                                        <div class="form-field">
                                            <div class="select-wrap">
                                                <div class="icon"><span class="ion-ios-arrow-down"></span></div>
                                                <select name="" id="" class="form-control">
                                                    <option value="">1 Adult</option>
                                                    <option value="">2 Adult</option>
                                                    <option value="">3 Adult</option>
                                                    <option value="">4 Adult</option>
                                                    <option value="">5 Adult</option>
                                                    <option value="">6 Adult</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md d-flex">
                                <div class="form-group d-flex align-self-stretch">
                                    <button type="submit"
                                            class="btn btn-black py-5 py-md-3 px-4 align-self-stretch d-block"><span>Check Availability <small>Best Price Guaranteed!</small></span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section> <!-- .section -->
    <section class="ftco-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="row">
                        <div class="col-md-12 ftco-animate">
                            <div class="single-slider owl-carousel">
                                <div class="item">
                                    <div class="room-img"
                                         style="background-image: url({{asset('images/room-4.jpg   ')}});"></div>
                                </div>
                                <div class="item">
                                    <div class="room-img"
                                         style="background-image: url({{asset('images/room-5.jpg')}});"></div>
                                </div>
                                <div class="item">
                                    <div class="room-img"
                                         style="background-image: url({{asset('images/room-6.jpg')}});"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 room-single mt-4 mb-5 ftco-animate">
                            <h2 class="mb-4">{{$room->name}} <span>- (10 Available rooms)</span></h2>
                            <p>{{$room->description}}</p>
                            <div class="d-md-flex mt-5 mb-5">
                                <ul class="list">
                                    <li><span>Max:</span> 3 Persons</li>
                                    <li><span>Size:</span> 45 m2</li>
                                </ul>
                                <ul class="list ml-md-5">
                                    <li><span>View:</span> Sea View</li>
                                    <li><span>Bed:</span> 1</li>
                                </ul>
                            </div>

                        </div>
                        <div class="col-md-12 room-single ftco-animate mb-5 mt-4">
                            <h3 class="mb-4">Take A Tour</h3>
                            <div class="block-16">
                                <figure>
                                    <img src="{{asset('storage/' . $room->image)}}" alt="Image placeholder"
                                         class="img-fluid">
                                    <a href="https://vimeo.com/45830194" class="play-button popup-vimeo"><span
                                            class="icon-play"></span></a>
                                </figure>
                            </div>
                        </div>

                        <div class="col-md-12 properties-single ftco-animate mb-5 mt-4">
                            <h4 class="mb-4">Review &amp; Ratings</h4>
                            <div class="row">
                                <div class="col-md-6">
                                    <form method="post" class="star-rating">
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                            <label class="form-check-label" for="exampleCheck1">
                                                <p class="rate"><span><i class="icon-star"></i><i class="icon-star"></i><i
                                                            class="icon-star"></i><i class="icon-star"></i><i
                                                            class="icon-star"></i> 100 Ratings</span></p>
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                            <label class="form-check-label" for="exampleCheck1">
                                                <p class="rate"><span><i class="icon-star"></i><i class="icon-star"></i><i
                                                            class="icon-star"></i><i class="icon-star"></i><i
                                                            class="icon-star-o"></i> 30 Ratings</span></p>
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                            <label class="form-check-label" for="exampleCheck1">
                                                <p class="rate"><span><i class="icon-star"></i><i class="icon-star"></i><i
                                                            class="icon-star"></i><i class="icon-star-o"></i><i
                                                            class="icon-star-o"></i> 5 Ratings</span></p>
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                            <label class="form-check-label" for="exampleCheck1">
                                                <p class="rate"><span><i class="icon-star"></i><i class="icon-star"></i><i
                                                            class="icon-star-o"></i><i class="icon-star-o"></i><i
                                                            class="icon-star-o"></i> 0 Ratings</span></p>
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                            <label class="form-check-label" for="exampleCheck1">
                                                <p class="rate"><span><i class="icon-star"></i><i
                                                            class="icon-star-o"></i><i class="icon-star-o"></i><i
                                                            class="icon-star-o"></i><i class="icon-star-o"></i> 0 Ratings</span>
                                                </p>
                                            </label>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> <!-- .col-md-8 -->
                <div class="col-lg-4 sidebar ftco-animate">
                    <div class="sidebar-box ftco-animate">
                        <h3>Recent Blog</h3>
                        <div class="block-21 mb-4 d-flex">
                            <a class="blog-img mr-4"
                               style="background-image: url({{asset('images/image_1.jpg')}});"></a>
                            <div class="text">
                                <h3 class="heading"><a href="#">Even the all-powerful Pointing has no control about the
                                        blind texts</a></h3>
                                <div class="meta">
                                    <div><a href="#"><span class="icon-calendar"></span> July 04, 2019</a></div>
                                    <div><a href="#"><span class="icon-person"></span> Admin</a></div>
                                    <div><a href="#"><span class="icon-chat"></span> 19</a></div>
                                </div>
                            </div>
                        </div>
                        <div class="block-21 mb-4 d-flex">
                            <a class="blog-img mr-4"
                               style="background-image: url({{asset('images/image_2.jpg')}});"></a>
                            <div class="text">
                                <h3 class="heading"><a href="#">Even the all-powerful Pointing has no control about the
                                        blind texts</a></h3>
                                <div class="meta">
                                    <div><a href="#"><span class="icon-calendar"></span> July 04, 2019</a></div>
                                    <div><a href="#"><span class="icon-person"></span> Admin</a></div>
                                    <div><a href="#"><span class="icon-chat"></span> 19</a></div>
                                </div>
                            </div>
                        </div>
                        <div class="block-21 mb-4 d-flex">
                            <a class="blog-img mr-4"
                               style="background-image: url({{asset('images/image_3.jpg')}});"></a>
                            <div class="text">
                                <h3 class="heading"><a href="#">Even the all-powerful Pointing has no control about the
                                        blind texts</a></h3>
                                <div class="meta">
                                    <div><a href="#"><span class="icon-calendar"></span> July 04, 2019</a></div>
                                    <div><a href="#"><span class="icon-person"></span> Admin</a></div>
                                    <div><a href="#"><span class="icon-chat"></span> 19</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
