@extends('layouts.admin.master')
@section('content')

    <div class="container-fluid">
        <ol class="breadcrumb mb-4 mt-4">
            <li class="breadcrumb-item"><a href="">Dash</a></li>
            <li class="breadcrumb-item"><a href="">Rooms Type</a></li>
            <li class="breadcrumb-item active">List</li>
        </ol>
        <div class="card mb-4">
            <div class="card-body">
                <div class="card-header"> <a href="{{route('roomType.admin.create')}}" class="btn btn-success">Create</a></div>
                <table class="table table-bordered clone2" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>STT</th>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Image</th>
                    </tr>
                    </thead>
                    <tfoot id="data-users">
                    @foreach($roomTypes as $key => $roomType)
                        <tr>
                            <td>{{ ++$key }}</td>
                            <td>{{ $roomType->name }}</td>
                            <td>{{ $roomType->price}}</td>
                            <td>
                                @if($roomType->image)
                                    <img src="{{ asset('storage/'.$roomType->image) }}" alt="" style="width: 200px; height: 200px">
                                @else
                                    {{'non-image'}}
                                @endif
                            </td>
                            <td>
                                <a href="{{route('roomType.admin.edit',$roomType->id)}}" class="btn btn-primary">Edit</a>
                                <a href="{{route('roomType.admin.destroy',$roomType->id)}}" class="btn btn-danger" onclick="return confirm('Do you want delete it?')">Delete</a>
                            </td>
                        </tr>
                    @endforeach
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
@endsection
