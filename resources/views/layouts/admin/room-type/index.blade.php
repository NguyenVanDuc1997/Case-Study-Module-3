@extends('layouts.admin.master');
@section('content')



    <div class="container-fluid">
        <ol class="breadcrumb mb-4 mt-4">
            <li class="breadcrumb-item"><a href="">Dash</a></li>
            <li class="breadcrumb-item"><a href="">Rooms</a></li>
            <li class="breadcrumb-item active">Create</li>
        </ol>
        <div class="card mb-4">
            <div class="card-header"><i class="fas fa-table mr-1"></i></div>
            <div class="card-body">
                <table class="table table-bordered clone2" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>STT</th>
                        <th>Name</th>
                        <th>Price</th>
                    </tr>
                    </thead>
                    <tfoot id="data-users">
                    @foreach($roomTypes as $key => $roomType)
                        <tr>
                            <td>{{ ++$key }}</td>
                            <td>{{ $roomType->name }}</td>
                            <td>{{ $roomType->price}}</td>
                            <td>
                                <a href=""
                                   class="btn btn-primary">Edit</a>
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
