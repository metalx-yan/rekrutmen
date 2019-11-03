@extends('main')

@section('content')
<div class="container-fluid">
       
        <div class="row page-titles">
            <div class="col-md-6 col-8 align-self-center">
                <h3 class="text-themecolor m-b-0 m-t-0">Dashboard</h3>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                    <li class="breadcrumb-item active">View</li>
                    <li class="breadcrumb-item active">User</li>
                </ol>
            </div>
        </div>
        <div class="card">
            <div class="card-title">
                <br>
                <div class="container">
                    <div class="row">
                        <div class="col-md-2">
                            <label for="">Name</label>
                            <input type="text" class="form-control" disabled value="{{ $view->name }}">
                        </div>
                        <div class="col-md-2">
                            <label for="">Username</label>
                            <input type="text" class="form-control" disabled value="{{ $view->name }}">
                        </div>
                        <div class="col-md-2">
                            <label for="">Role</label>
                            <input type="text" class="form-control" disabled value="{{ $view->role->name }}">
                        </div>
                        
                        <div class="col-md-2">
                            <button type="button" style="margin-top:32px;" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                                    Edit Password
                                </button>
                            </div>
                        </div>
                          
                          <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Edit Password</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            
                            <div class="modal-body">
                                {{-- {{ $view }} --}}
                                <div class="row">
                                    
                                    <form action=" {{ Auth::user()->role->name == 'administrator' ? route('updatedata.admin', $view->id) : route('updatedata.hrd', $view->id) }} " method="post">
                                            @csrf
                                            @method('PUT')
                                            <div class="container">

                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <label>New Password</label>
                                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                                                        @error('password')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                    
                                                    <div class="col-md-6">
                                                        <label>Password Confirmation</label>
                                                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                                        
                                                    </div>
                                                </div>

                                                <br>
                                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                            </div>
                                        </form>
                                </div>
                            </div>
                            <div class="modal-footer">
                            </div>
                            </div>
                        </div>
                    </div>

                   

                
            </div>
            
        </div>
        
    </div>
        <footer class="footer">
            © 2017 Monster Admin by wrappixel.com
        </footer>

        


@endsection