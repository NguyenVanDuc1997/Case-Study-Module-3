@extends('layouts.admin.master');
@section('content')
    <div class="container-fluid">
        <ol class="breadcrumb mb-4 mt-4">
            <li class="breadcrumb-item"><a href="">Dash</a></li>
            <li class="breadcrumb-item"><a href="{{route('roomType.index')}}">Rooms Type</a></li>
            <li class="breadcrumb-item active">Edit</li>
        </ol>
        <div class="card mb-4">
            <div class="card-header"><i class="fas fa-table mr-1"></i></div>
            <div class="card-body">
                <form method="post" action="{{route('roomType.store',$roomType->id)}}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label>Room Type Name</label>
                        <input type="text" class="form-control" value="{{$roomType->name}}" name="name">
                        @if($errors)
                            <p class="text-danger">{{$errors->first('name')}}</p>
                        @endif
                    </div>

                    <div class="form-group">
                        <label>Price</label>
                        <input type="text" class="form-control" value="{{$roomType->price}}" name="price">
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <input type="text" class="form-control" value="{{$roomType->description}}" name="description">
                    </div>

                    <div class="form-group">

                        <label for="exampleFormControlFile1">Image</label>

                        <input type="file" name="image" class="form-control-file" >

                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Update</button>
                        <a href="{{route('roomType.index')}}" class="btn btn-secondary">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

