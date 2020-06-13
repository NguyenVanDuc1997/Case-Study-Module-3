@extends('layouts.admin.master');
@section('content')
    <div class="container-fluid">
        <ol class="breadcrumb mb-4 mt-4">
            <li class="breadcrumb-item"><a href="">Dash</a></li>
            <li class="breadcrumb-item"><a href="{{route('roomType.admin.index')}}">Rooms Type</a></li>
            <li class="breadcrumb-item active">Edit</li>
        </ol>
        <div class="card mb-4">

            <div class="card-body">
                <form method="post" action="{{route('roomType.admin.store')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label>Room Type Name</label>
                        <input type="text" class="form-control"  name="name" required>
                        @if($errors)
                            <p class="text-danger">{{$errors->first('name')}}</p>
                        @endif
                    </div>

                    <div class="form-group">
                        <label>Price</label>
                        <input type="text" class="form-control" name="price" required>
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <input type="text" class="form-control"  name="description" required>
                    </div>

                    <div class="form-group">

                        <label for="exampleFormControlFile1">Image</label>

                        <input type="file" name="image" class="form-control-file" >

                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Create</button>
                        <a href="{{route('roomType.admin.index')}}" class="btn btn-secondary">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

