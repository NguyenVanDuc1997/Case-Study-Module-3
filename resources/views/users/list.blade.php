@extends('layouts.admin.master');
@section('content')

    <div class="container-fluid">
        <ol class="breadcrumb mb-4 mt-4">
            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
            <li class="breadcrumb-item active">User</li>
        </ol>
        <div class="card mb-4">
            <div class="card-header"><i class="fas fa-table mr-1"></i></div>
            <div class="card-body">
                <div class="table-responsive">
                    <div class="col-12 col-md-12">
                        <div class="row">
                            <div class="col-12 col-md-4 p-0">
                                <a class="btn btn-success mb-2" href="{{ route('users.create') }}">Create</a>
                            </div>
                            <div class="col-12 col-md-8">
                                <form class="form-inline my-2 my-lg-0" method="get" action="{{route('users.search')}}">
                                    @csrf
                                    <input class="form-control mr-sm-2" name="keyword"
                                           value="{{ (request('keyword')) ? request('keyword') : '' }}" type="search"
                                           placeholder="Search"
                                           aria-label="Search">
                                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    @if(request('keyword'))
                        <div class="col-12">
                            <p class="text-info">About {{ $users->count() }} results</p>
                        </div>
                    @endif
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>STT</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tfoot>
                        @forelse($users as $key => $user)
                            <tr>
                                <td>{{ ++$key }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>
                                    @if($user->role == \App\Http\Controllers\RoleConstant::ADMIN)
                                        Admin
                                    @else
                                        User
                                    @endif
                                </td>
                                <td>
                                        <a href="{{ route('users.update', ['id' => $user->id]) }}"
                                           class="btn btn-primary">Edit</a>
                                        <a href="{{ route('users.delete', ['id' => $user->id]) }}" class="btn btn-danger">Delete</a>
                                </td>

                            </tr>
                        @empty
                            <tr>
                                <td colspan="4">No data</td>
                            </tr>
                        @endforelse
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
    @toastr_render
@endsection


