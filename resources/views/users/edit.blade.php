@extends('main')

@section('content')
<div class="container-fluid">
       
        <div class="row page-titles">
            <div class="col-md-6 col-8 align-self-center">
                <h3 class="text-themecolor m-b-0 m-t-0">Dashboard</h3>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                    <li class="breadcrumb-item active">Update</li>
                    <li class="breadcrumb-item active">User</li>
                </ol>
            </div>
        </div>
        <div class="card">

            <div class="card-body">

                    <form action=" {{ route('user.update', $user->id) }} " method="post">
                            @method('PUT')
                            @csrf
                            <div class="row">
                                <div class="form-group col-md-4">
                                    <label>Nama</label>
                                    <input type="name" value="{{ $user->name }}" name="name" class="form-control {{ $errors->has('name') ? 'is-invalid' : ''}}" id="name" autocomplete="off">
                                    {!! $errors->first('name', '<span class="invalid-feedback">:message</span>') !!}
                                </div>
                                <div class="form-group col-md-4">
                                    <label>Username</label>
                                    <input type="username" value="{{ $user->username }}" name="username" class="form-control {{ $errors->has('username') ? 'is-invalid' : ''}}" id="username" autocomplete="off">
                                    {!! $errors->first('username', '<span class="invalid-feedback">:message</span>') !!}
                                </div>
                                
                                <div class="form-group col-md-4">
                                    <label>Role</label>
                                    <select value="{{ old('role_id') }}"  class="form-control {{ $errors->has('role_id') ? 'is-invalid' : ''}}" name="role_id" id="exampleFormControlSelect1">
                                        @foreach ($roles as $role)
                                            <option value="{{ $role->id }}" {{ old("role_id", $user->role_id) == $role->id ? "selected" : "" }}>{{ $role->name }}  </option>
                                            @endforeach
                                    </select>
                                    {!! $errors->first('role_id', '<span class="invalid-feedback">:message</span>') !!}
                                </div>
                            </div>
                            
                            <input type="hidden" value="{{ $user->password }}" name="password" id="username" autocomplete="off">
                            <div class="row">
                                <div class="form-group col-md-4">
                                    <button type="submit" class="btn btn-primary">Create</button>
                                </div>
                            </div>
                        </form>
            </div>
        </div>
@endsection