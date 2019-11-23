@extends('main')

@section('content')
<div class="container-fluid">
       
        <div class="row page-titles">
            <div class="col-md-6 col-8 align-self-center">
                <h3 class="text-themecolor m-b-0 m-t-0">Dashboard</h3>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                    <li class="breadcrumb-item active">Show</li>
                </ol>
            </div>
        </div>
        <div class="card">
            <div class="card-title">
               
            </div>
            <div class="card-body">
                    <form action=" {{ route('assessment.store') }} " method="post">
                            @csrf
                            <div class="row">
                                <input type="hidden" name="applicant_id" value="{{ $app->id }}">
                                <div class="form-group col-md-4">
                                    <label>Nilai Interview</label>
                                    <input type="number" max="100" value="{{ old('interview') }}" name="interview" class="form-control {{ $errors->has('interview') ? 'is-invalid' : ''}}" id="interview" autocomplete="off" required>
                                    {!! $errors->first('interview', '<span class="invalid-feedback">:message</span>') !!}
                                </div>
                                <div class="form-group col-md-4">
                                    <label>Nilai Tertulis</label>
                                    <input type="number" max="100" value="{{ old('written') }}" name="written" class="form-control {{ $errors->has('written') ? 'is-invalid' : ''}}" id="written" autocomplete="off" required>
                                    {!! $errors->first('written', '<span class="invalid-feedback">:message</span>') !!}
                                </div>
                                <div class="form-group col-md-4">
                                    <label>&nbsp;</label>
                                    <br>
                                    <button type="submit" class="btn btn-success"> Submit </button>
                                </div>
                            </div>
                    </form>
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