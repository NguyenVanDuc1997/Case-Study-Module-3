@extends('layouts.admin.master');
@section('content')
    <div class="container-fluid">
        <ol class="breadcrumb mb-4 mt-4">
            <li class="breadcrumb-item"><a href="">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('users.list') }}">Users</a></li>
            <li class="breadcrumb-item active">Create</li>
        </ol>
        <div class="card mb-4">
            <div class="card-header"><i class="fas fa-table mr-1"></i></div>
            <div class="card-body">
                <form method="post" action="{{ route('users.store') }}">
                    @csrf
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" required minlength="4" class="form-control
                        @if($errors->first('name'))
                            is-invalid
@endif
                            " value="{{ old('name') }}" name="name">
                        @if($errors->first('name'))
                            <p class="text-danger">{{ $errors->first('name') }}</p>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Email</label>
                        <input type="email" required value="{{ old('email') }}" name="email" class="form-control
                        @if($errors->first('email'))
                            is-invalid
@endif
                            ">
                        @if($errors->first('email'))
                            <p class="text-danger">{{ $errors->first('email') }}</p>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Password</label>
                        <input type="password" name="password" required minlength="8" maxlength="32" value="" class="form-control
                        @if($errors->first('password'))
                            is-invalid
@endif">
                        @if($errors->first('password'))
                            <p class="text-danger">{{ $errors->first('password') }}</p>
                        @endif
                    </div>

                    <div class="form-group">
                        <label>Role</label>
                        <select class="form-control" name="role">
                            <option
                                value="{{ \App\Http\Controllers\RoleConstant::ADMIN }}">Admin
                            </option>
                            <option
                                value="{{ \App\Http\Controllers\RoleConstant::USER }}">User
                            </option>
                        </select>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Create</button>
                        <a href="{{ route('users.list') }}" class="btn btn-secondary">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @toastr_render
@endsection



