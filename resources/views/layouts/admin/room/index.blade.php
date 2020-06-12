@extends('layouts.admin.master');
@section('content')
    <div class="container-fluid">
        <ol class="breadcrumb mb-4 mt-4">
            <li class="breadcrumb-item"><a href="">Dash</a></li>
            <li class="breadcrumb-item"><a href="">Rooms</a></li>
            <li class="breadcrumb-item active">List</li>
        </ol>
        <div class="card mb-4">
            <div class="card-header"><i class="fas fa-table mr-1"></i> <a href="{{route('room.show-form-create')}}" class="btn btn-success">Create</a></div>
            <div class="card-body">
                <table class="table table-bordered clone2" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>STT</th>
                        <th>Name</th>
                        <th>Type Room</th>
                    </tr>
                    </thead>
                    <tfoot id="data-users">
                    @foreach($room as $key => $value)
                        <tr>
                            <td>{{ ++$key }}</td>
                            <td>{{ $value->name }}</td>
                            <td>{{ $value->roomType->name}}</td>
                            <td>
                                <a href="{{route('room.edit',$value->id)}}"
                                   class="btn btn-primary">Edit</a>
                                <a href="{{route('room.delete',$value->id)}}" class="btn btn-danger">Delete</a>
                            </td>
                        </tr>
                    @endforeach
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
@endsection