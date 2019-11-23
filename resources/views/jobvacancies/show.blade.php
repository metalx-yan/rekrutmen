

 <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Lamaran</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="{{ asset('fonts-detail/material-icon/css/material-design-iconic-font.min.css') }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">


    <!-- Main css -->
    {{-- <link rel="stylesheet" href="{{ asset('css-detail/style.css') }}"> --}}
</head>
<body>
    <br>
        <div class="container-fluid" style="width: 600px;">
        
            <div class="card bg-light mb-3" style="max-width: 100%;">
                <br>
                    <img src="http://www.prospera-perwira.com/img/logo_prospera.png" height="35%" width="35%" style="margin-left:20px;" alt="">
                    <div class="row">
                        <span style="font-size: 200%; font-weight: bold; margin-left: 25%; margin-top:3%; margin-bottom:2%;">Lowongan Pekerjaan</span>
                        
                        <p style="width:90%; margin-left:30px; text-align:justify;">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Molestias ab aliquam perferendis reiciendis dolor quae repudiandae iste impedit temporibus at, laborum quia consequuntur eligendi voluptas recusandae. Eius sequi iure dolores.</p>
                    </div>
                    <hr>
                        <h2><center>{{ ucwords($job->name) }}</center></h2>
                        <div class="align-center" style="width:90%; margin-left:30px; text-align:justify;">

                            <h4>
                                <b>Criteria</b>
                            </h4>
                            @foreach ($job->criterias as $criteria)
                            <h6><li style="color: #777;">{{ $criteria->name }}</li></h6>
                            @endforeach
                            <br>
                            
                            <h4>
                                <b>Requirement</b>
                            </h4>
                            @foreach ($job->requirements as $requirement)
                            <h6><li style="color: #777;">{{ $requirement->name }}</li></h6>
                            @endforeach
                            <br>
                            <p>Kirimkan CV dan Pas Foto terbaru paling lambat {{ $job->end->format('d-m-Y') }}.</p>
                        </div>
                <br>
                <div class="apply" style="margin-left:75%;">
                    <p>
                        <button type="button" class="btn btn-primary btn-sm pull-right"  data-toggle="modal" data-target="#exampleModal">
                                Apply
                        </button>
                        <a href="{{ url('/') }}" class="btn btn-danger btn-sm pull-right">Back</a>
                    </p>
                </div>
                <div class="modal fade" id="exampleModal" data-keyboard="false" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-xl" role="document">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Apply Job</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body" >
                                <form action=" {{ route('store.user') }} " method="POST" enctype="multipart/form-data" files="true">
                                        @csrf
                                        <div class="row">
                                            <input type="hidden" value="{{ $job->id }}" name="job_vacancy_id" class="form-control {{ $errors->has('job_vacancy_id') ? 'is-invalid' : ''}}" id="job_vacancy_id" autocomplete="off">
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
                        </div>
                    </div>
            </div>
        </div>

    <!-- JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    {{-- <script src="{{ asset('vendor-detail/jquery/jquery.min.js') }}"></script> --}}
    {{-- <script src="{{ asset('js=detail/main.js') }}"></script> --}}
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>