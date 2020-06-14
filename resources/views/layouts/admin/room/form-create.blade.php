@extends('layouts.admin.master');
@section('content')
    <div class="container-fluid">
        <ol class="breadcrumb mb-4 mt-4">
            <li class="breadcrumb-item"><a href="">Dash</a></li>
            <li class="breadcrumb-item"><a href="">Rooms</a></li>
            <li class="breadcrumb-item active">Create</li>
        </ol>
        <div class="card mb-4">
            <div class="card-header"></div>
            <div class="card-body">
                <form method="post" action="{{route('room.create-room')}}" >
                    @csrf
                    <div class="form-group">
                        <label>Room Name</label>
                        <input type="text" class="form-control" value="" name="name" required>
                        @if($errors)
                            <p class="text-danger">{{$errors->first('name')}}</p>
                        @endif
                    </div>
                    <div class="form-group">
                        <label>Type Room</label>
                        <select class="form-control" name="type">
                            @foreach($roomTypes as $value)

                                <option value="{{$value->id}}"
                                        >{{$value->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Create</button>
                        <a href="{{route('room.index')}}" class="btn btn-secondary">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
