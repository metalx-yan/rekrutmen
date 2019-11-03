@extends('main')

@section('content')
<div class="container-fluid">
       
        <div class="row page-titles">
            <div class="col-md-6 col-8 align-self-center">
                <h3 class="text-themecolor m-b-0 m-t-0">Dashboard</h3>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                    <li class="breadcrumb-item active">User</li>
                    <li class="breadcrumb-item active">List</li>
                </ol>
            </div>
        </div>
        <div class="card">
            <div class="card-title">
                <br>
                <button type="button" class="btn btn-primary" style="margin-left: 20px;" data-toggle="modal" data-target="#exampleModal">
                    Registration User
                </button>

                <div class="modal fade" id="exampleModal" data-keyboard="false" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-xl" role="document">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Create User</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body" >
                            <form action=" {{ route('user.store') }} " method="post">
                                    @csrf
                                    <div class="row">
                                        <div class="form-group col-md-4">
                                            <label>Nama</label>
                                            <input type="name" value="{{ old('name') }}" name="name" class="form-control {{ $errors->has('name') ? 'is-invalid' : ''}}" id="name" autocomplete="off">
                                            {!! $errors->first('name', '<span class="invalid-feedback">:message</span>') !!}
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label>Username</label>
                                            <input type="username" value="{{ old('username') }}" name="username" class="form-control {{ $errors->has('username') ? 'is-invalid' : ''}}" id="username" autocomplete="off">
                                            {!! $errors->first('username', '<span class="invalid-feedback">:message</span>') !!}
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label>Role</label>
                                            <select value="{{ old('role_id') }}" class="form-control {{ $errors->has('role_id') ? 'is-invalid' : ''}}" name="role_id" id="exampleFormControlSelect1">
                                                <option></option>
                                                @foreach ($roles as $role)
                                                    <option value="{{ $role->id }}">{{ $role->name }} </option>
                                                @endforeach
                                            </select>
                                            {!! $errors->first('role_id', '<span class="invalid-feedback">:message</span>') !!}
                                        </div>
                                    </div>
                                    
                                    <div class="row">
                                        <div class="form-group col-md-4">
                                            <button type="submit" class="btn btn-primary">Create</button>
                                        </div>
                                    </div>
                                </form>
                        </div>
                       
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <table class="table border" id="myTable">
                    <thead>
                        <th>id</th>
                        <th>Nama</th>
                        <th>Username</th>
                        <th>Role</th>
                        <th>Action</th>
                    </thead>

                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td> {{ $user->id }} </td>
                                <td> {{ $user->name }} </td>
                                <td> {{ $user->username }} </td>
                                <td> {{ $user->role->name }} </td>
                                <td>
                                    <div class="row">
                                        <div class="col-md-2">
                                        <a href="  " class="btn btn-warning btn-sm">Update
                                            <i class="ion ion-edit"></i>
                                        </a>
                                        </div>
                                        <p>
                                        <div class="col-md-4">
                                            <form action=" {{ route('resetdata.admin', $user->id) }} " method="post">
                                                @csrf
                                                @method('PUT')
                                                <button type="submit" style="margin-left: 4px" class="btn btn-primary btn-sm" >
                                                        Reset Pass
                                                </button>
                                            </form>
                                        </div>
                        
                                        <div class="col-md-1">
                                            <form class="" action="  " method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button style="margin-left: -33px" class="ion ion-android-delete btn btn-danger btn-sm" onclick="return confirm('Are you sure?')" name="delete" type="submit">Delete</button>
                                            </form>
                                        </div>

                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        
    </div>
        <footer class="footer">
            © 2017 Monster Admin by wrappixel.com
        </footer>

        

@endsection

@section('scripts')
   
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>

    <script>
        $(document).ready( function () {
            $('#myTable').DataTable();
        } );
    </script>

@endsection