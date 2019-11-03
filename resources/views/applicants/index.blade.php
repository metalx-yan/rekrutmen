@extends('main')

@section('content')
<div class="container-fluid">
       
        <div class="row page-titles">
            <div class="col-md-6 col-8 align-self-center">
                <h3 class="text-themecolor m-b-0 m-t-0">Dashboard</h3>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                    <li class="breadcrumb-item active">Applicant</li>
                </ol>
            </div>
        </div>
        <div class="card">
            <div class="card-title">
                <br>
                <div class="container-fluid">
                    <form action=" {{ route('applicant.store') }} " method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <input type="hidden" value="1" name="job_vacancy_id" id="job_vacancy_id" autocomplete="off">

                            <div class="form-group col-md-4">
                                <label>NIK</label>
                                <input type="nik" value="{{ old('nik') }}" name="nik" class="form-control {{ $errors->has('nik') ? 'is-invalid' : ''}}" id="nik" autocomplete="off">
                                {!! $errors->first('nik', '<span class="invalid-feedback">:message</span>') !!}
                            </div>
                            <div class="form-group col-md-4">
                                <label>Nama</label>
                                <input type="name" value="{{ old('name') }}" name="name" class="form-control {{ $errors->has('name') ? 'is-invalid' : ''}}" id="name" autocomplete="off">
                                {!! $errors->first('name', '<span class="invalid-feedback">:message</span>') !!}
                            </div>
                            <div class="form-group col-md-4">
                                <label>Tempat Lahir</label>
                                <input type="place_of_birth" value="{{ old('place_of_birth') }}" name="place_of_birth" class="form-control {{ $errors->has('place_of_birth') ? 'is-invalid' : ''}}" id="place_of_birth" autocomplete="off">
                                {!! $errors->first('place_of_birth', '<span class="invalid-feedback">:message</span>') !!}
                            </div>                            
                        </div>
                        <div class="row">
                            <div class="form-group col-md-4">
                                <label>Tanggal Lahir</label>
                                <input type="date" value="{{ old('date_of_birth') }}" name="date_of_birth" class="form-control {{ $errors->has('date_of_birth') ? 'is-invalid' : ''}}" id="date_of_birth" autocomplete="off">
                                {!! $errors->first('date_of_birth', '<span class="invalid-feedback">:message</span>') !!}
                            </div>
                            <div class="form-group col-md-4">
                                <label>Telepon</label>
                                <input type="telp" value="{{ old('telp') }}" name="telp" class="form-control {{ $errors->has('telp') ? 'is-invalid' : ''}}" id="telp" autocomplete="off">
                                {!! $errors->first('telp', '<span class="invalid-feedback">:message</span>') !!}
                            </div>
                            <div class="form-group col-md-4">
                                <label>Jenis Kelamin</label>
                                <br>
                                <input type="radio" name="gender" autocomplete="off" value="0"> Laki Laki
                                <br>
                                <input type="radio" name="gender" autocomplete="off" value="1"> Perempuan
                                {!! $errors->first('gender', '<span class="invalid-feedback">:message</span>') !!}
                            </div>                            
                        </div>
                        <div class="row">
                            <div class="form-group col-md-4">
                                <label>Status Pernikahan</label>
                                <br>
                                <input type="radio" name="status" autocomplete="off" value="0"> Belum Menikah
                                <br>
                                <input type="radio" name="status" autocomplete="off" value="1"> Menikah
                                {!! $errors->first('status', '<span class="invalid-feedback">:message</span>') !!}
                            </div>    
                            <div class="form-group col-md-4">
                                <label>Agama</label>
                                <input type="religion" value="{{ old('religion') }}" name="religion" class="form-control {{ $errors->has('religion') ? 'is-invalid' : ''}}" id="religion" autocomplete="off">
                                {!! $errors->first('religion', '<span class="invalid-feedback">:message</span>') !!}
                            </div>
                            <div class="form-group col-md-4">
                                <label>Email</label>
                                <br>
                                <input type="email" name="email" autocomplete="off" value="{{ old('email') }}" class="form-control {{ $errors->has('email') ? 'is-invalid' : ''}}"> 
                                {!! $errors->first('email', '<span class="invalid-feedback">:message</span>') !!}
                            </div>                            
                        </div>
                        <div class="row">
                            <div class="form-group col-md-4">
                                <label>Berkas Lamaran</label>
                                <input type="file" value="{{ old('resume') }}" name="resume" class="form-control" id="resume" autocomplete="off">
                                {{-- {!! $errors->first('resume', '<span class="invalid-feedback">:message</span>') !!} --}}
                                <label><i style="color:red; font-size: 10px; ">Mohon Mengupload Berkas Lamaran Dengan Format .Pdf</i></label>
                            </div>
                            <div class="form-group col-md-8">
                                <label>Alamat</label>
                                <textarea name="address" cols="" rows="3" class="form-control {{ $errors->has('address') ? 'is-invalid' : ''}}" ></textarea>
                                {!! $errors->first('address', '<span class="invalid-feedback">:message</span>') !!}
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="form-group col-md-4">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
                
            </div>
            <div class="card-body">
                <table class="table border" id="myTable">
                    <thead>
                        <th>NIK</th>
                        <th>Nama</th>
                        <th>Tempat Lahir</th>
                        <th>Tanggal Lahir</th>
                        <th>Telepon</th>
                        <th>Jenis Kelamin</th>
                        <th>Status Pernikahan</th>
                        <th>Agama</th>
                        <th>Email</th>
                        <th>Alamat</th>
                        <th>Berkas Lamaran</th>
                    </thead>

                    <tbody>
                        @foreach ($applicants as $applicant)
                            <tr>
                                <td> {{ $applicant->nik }} </td>
                                <td> {{ $applicant->name }} </td>
                                <td> {{ $applicant->place_of_birth }} </td>
                                <td> {{ $applicant->date_of_birth->format('d-m-Y') }} </td>
                                <td> {{ $applicant->telp }} </td>
                                <td> {{ $applicant->gender == 0 ? 'Laki-Laki' : 'Perempuan' }}</td>
                                <td> {{ $applicant->status == 0 ? 'Belum Menikah' : 'Menikah' }} </td>
                                <td> {{ $applicant->religion }} </td>
                                <td> {{ $applicant->email }} </td>
                                <td> {{ $applicant->address }} </td>
                                <td> <a href=" {{ route('applicant.download', $applicant->id ) }} "> <button type="button" class="btn btn-info btn-sm">Download</button> </a> </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{-- {{ $user->links() }} --}}
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