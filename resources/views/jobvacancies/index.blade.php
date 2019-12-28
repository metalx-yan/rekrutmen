@extends('main')

@section('content')
<div class="container-fluid">
       
        <div class="row page-titles">
            <div class="col-md-6 col-8 align-self-center">
                <h3 class="text-themecolor m-b-0 m-t-0">Dashboard</h3>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                    <li class="breadcrumb-item active">Job Vacancy</li>
                    <li class="breadcrumb-item active">List</li>
                </ol>
            </div>
        </div>
        <div class="card">
            <div class="card-title">
                <br>
                <button type="button" class="btn btn-primary" style="margin-left: 20px;" data-toggle="modal" data-target="#exampleModal">
                    Create Job Vacancy
                </button>

                <div class="modal fade" id="exampleModal" data-keyboard="false" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-xl" role="document">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Create Job Vacancy</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body" >
                            <form action=" {{ route('jobvacancy.store') }} " method="post">
                                    @csrf
                                    <div class="row">
                                        <div class="form-group col-md-4">
                                            <label>Tanggal Mulai</label>
                                            <input type="date" value="{{ old('start') }}" name="start" class="form-control {{ $errors->has('start') ? 'is-invalid' : ''}}" id="start" autocomplete="off">
                                            {!! $errors->first('start', '<span class="invalid-feedback">:message</span>') !!}
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label>Tanggal Berakhir</label>
                                            <input type="date" value="{{ old('end') }}" name="end" class="form-control {{ $errors->has('end') ? 'is-invalid' : ''}}" id="end" autocomplete="off">
                                            {!! $errors->first('end', '<span class="invalid-feedback">:message</span>') !!}
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label>Bagian</label>
                                            <input type="text" value="{{ old('name') }}" name="name" class="form-control {{ $errors->has('name') ? 'is-invalid' : ''}}" id="name" autocomplete="off">
                                            {!! $errors->first('name', '<span class="invalid-feedback">:message</span>') !!}
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="form-group col-md-4">
                                            <label>Persyaratan Pelamar</label>
                                            <div id="plusrec">
                                                <input type="text" name="requirements[]" class="form-control {{ $errors->has('requirements') ? 'is-invalid' : ''}}" id="requirements" required autocomplete="off">
                                                <label>&nbsp;</label>
                                            </div>
                                            {!! $errors->first('requirements', '<span class="invalid-feedback">:message</span>') !!}
                                        </div>
                                        <div class="form-group col-md-2">
                                            <label>&nbsp;</label>
                                            <br>
                                            <button type="button" id="addrec" name="add" class="btn btn-success">Add</button>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label>Kriteria</label>
                                            <div id="pluscri">
                                                <input type="text" name="criterias[]" class="form-control {{ $errors->has('criterias') ? 'is-invalid' : ''}}" id="criterias" autocomplete="off" required>
                                                <label>&nbsp;</label>
                                            </div>
                                            {!! $errors->first('criterias', '<span class="invalid-feedback">:message</span>') !!}
                                        </div>
                                        <div class="form-group col-md-2">
                                            <label>&nbsp;</label>
                                            <br>
                                            <button type="button" id="addcri" name="add" class="btn btn-success">Add</button>
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
                        <th>Id</th>
                        <th>Tanggal Mulai</th>
                        <th>Tanggal Berakhir</th>
                        <th>Bagian</th>
                        <th>Status</th>
                        <th>Action</th>
                    </thead>

                    <tbody>
                        @foreach ($jobs as $job)
                            @if ($job->end->format('d-m-Y') == Carbon\Carbon::now()->format('d-m-Y'))
                                
                            @else
                                
                            <tr>
                                <td> {{ $job->id }} </td>
                                <td> {{ $job->start->format('d-m-Y') }} </td>
                                <td> {{ $job->end->format('d-m-Y') }} </td>
                                <td> {{ $job->name }} </td>
                                <td> {{ $job->status == 1 ? 'Buka' : 'Tutup' }} </td>
                                <td><a href="{{ route('jobUpdate', $job->id) }}" class="btn btn-warning btn-sm">Edit</a></td>
                            </tr>
                            @endif

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

    <script>
        var today = new Date().toISOString().split('T')[0];
        document.getElementsByName("start")[0].setAttribute('min', today);
    </script>

    <script>
        var today = new Date().toISOString().split('T')[0];
        document.getElementsByName("end")[0].setAttribute('min', today);
    </script>

    <script type="text/javascript">
    
        var i = 0;
        
        $("#addrec").click(function(){
    
            ++i;
            

            $("#plusrec").append('<div id="hide"><input type="text" name="requirements[]" required class="form-control {{ $errors->has('requirements') ? 'is-invalid' : ''}}" id="recruitments" autocomplete="off"><button type="button" class="btn btn-danger remove-tr">Remove</button></div>');
            $('#plusrec').append('<br id="rem">')

        });
    
        $(document).on('click', '.remove-tr', function(){  
            $('#hide').remove();
            $('#rem').remove();
        });  
    
    </script>

<script type="text/javascript">
    
    var i = 0;
    
    $("#addcri").click(function(){

        ++i;

        $("#pluscri").append('<div id="hids"><input type="text" name="criterias[]" required class="form-control {{ $errors->has('criterias') ? 'is-invalid' : ''}}" id="criterias" autocomplete="off"><button type="button" class="btn btn-danger remove-trs">Remove</button></div>');
        $('#pluscri').append('<br id="rems">')

    });

    $(document).on('click', '.remove-trs', function(){  
        $('#hids').remove();
        $('#rems').remove();
    });  

</script>
@endsection