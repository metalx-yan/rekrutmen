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
                
            </div>
            <div class="card-body">
                <table class="table border" id="myTable">
                    <thead>
                        <th>Id</th>
                        <th>Bagian</th>
                        <th>Tanggal Wawancara</th>
                        <th>Waktu Wawancara</th>
                        <th>Tempat Wawancara</th>
                        <th>Create Schedule</th>
                    </thead>

                    <tbody>
                        @foreach ($jobs as $job)
                            @if ($job->interviewdate == null || $job->interviewtime == null || $job->room == null)
                            <tr>
                                <td> {{ $job->id }} </td>
                                <td> {{ $job->name }} </td>
                                <td> - </td>
                                <td> - </td>
                                <td> - </td>
                                <td>
                                        <button type="button" class="btn btn-primary" style="margin-left: 20px;" data-toggle="modal" data-target="#exampleModal">
                                                Create
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
                                                        <form action=" {{ route('schedule.store.job', $job->id) }} " method="post">
                                                                @csrf
                                                                @method('PUT')
                                                                <div class="row">
                                                                    
                                                                    <div class="form-group col-md-4">
                                                                        <label>Tanggal Wawancara</label>
                                                                        <input type="date" value="{{ old('interviewdate') }}" name="interviewdate" class="form-control {{ $errors->has('interviewdate') ? 'is-invalid' : ''}}" id="interviewdate" autocomplete="off">
                                                                        {!! $errors->first('interviewdate', '<span class="invalid-feedback">:message</span>') !!}
                                                                    </div>
                                                                    <div class="form-group col-md-4">
                                                                        <label> Waktu Wawancara</label>
                                                                        <input type="time" value="{{ old('interviewtime') }}" name="interviewtime" class="form-control {{ $errors->has('interviewtime') ? 'is-invalid' : ''}}" id="interviewtime" autocomplete="off">
                                                                        {!! $errors->first('interviewtime', '<span class="invalid-feedback">:message</span>') !!}
                                                                    </div>
                                                                    <div class="form-group col-md-4">
                                                                        <label>Tempat Wawancara</label>
                                                                        <input type="text" value="{{ old('room') }}" name="room" class="form-control {{ $errors->has('room') ? 'is-invalid' : ''}}" id="room" autocomplete="off">
                                                                        {!! $errors->first('room', '<span class="invalid-feedback">:message</span>') !!}
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
                                </td>
                            </tr>
                            @else
                                <tr>
                                    <td> {{ $job->id }} </td>
                                    <td> {{ $job->name }} </td>
                                    <td> {{ $job->interviewdate->format('d/m/Y') }} </td>
                                    <td> {{ $job->interviewtime }} </td>
                                    <td> {{ $job->room }} </td>
                                    <td> 
                                        <a href="{{ route('jobvacancy.edit', $job->id) }}" style="margin-left:17px;" class="btn btn-warning">Update</a>
                                    </td>
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
            

            $("#plusrec").append('<div id="hide"><input type="text" name="requirements[]" class="form-control {{ $errors->has('requirements') ? 'is-invalid' : ''}}" id="recruitments" autocomplete="off"><button type="button" class="btn btn-danger remove-tr">Remove</button></div>');
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

        $("#pluscri").append('<div id="hids"><input type="text" name="criterias[]" class="form-control {{ $errors->has('criterias') ? 'is-invalid' : ''}}" id="criterias" autocomplete="off"><button type="button" class="btn btn-danger remove-trs">Remove</button></div>');
        $('#pluscri').append('<br id="rems">')

    });

    $(document).on('click', '.remove-trs', function(){  
        $('#hids').remove();
        $('#rems').remove();
    });  

</script>
@endsection