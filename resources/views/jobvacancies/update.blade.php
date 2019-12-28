@extends('main')

@section('content')
<div class="container-fluid">
       
    <div class="row page-titles">
        <div class="col-md-6 col-8 align-self-center">
            <h3 class="text-themecolor m-b-0 m-t-0">Dashboard</h3>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active">Job Vacancy</li>
                <li class="breadcrumb-item active">Edit</li>
            </ol>
        </div>
    </div>
    <div class="card">
        <div class="card-title">
            <br>
        </div>
            <div class="card-body">
                <div class="row">
                    @foreach ($criterias as $criteria)
        
                    <div class="form-group col-md-4">
                        <div id="secondOne">
                        <label>Kriteria</label>
                            <input disabled type="text" name="criterias[]" value="{{$criteria->name}}" class="form-control {{ $errors->has('criterias') ? 'is-invalid' : ''}}" id="criterias" autocomplete="off">
                            <label>&nbsp;</label>
                        </div>
                        {!! $errors->first('criterias', '<span class="invalid-feedback">:message</span>') !!}
                    </div>
        
                    <div class="form-group col-md-2"  style="margin-top:1%;">
                        <br>
                        <a href="{{ route('criteria.edit', $criteria->id) }}" class="form-control btn btn-warning btn-sm" style="color:white;">Edit</a>                    
                        <br>
                        <form action="{{ route('criteria.destroy', $criteria->id) }}" method="post">
                            @method('DELETE')
                            @csrf
                                <input class="btn btn-danger btn-sm" type="submit" value="Delete" />
                        </form>
                    </div>                    
                @endforeach
                </div>
<hr>
                <div class="row">

                @foreach ($requirements as $requirement)
                    
                {{-- <div class="row"> --}}
                    <div class="form-group col-md-4">
                        <div id="firstOne">
                        <label>Persyaratan Pelamar</label>
                        <div class="requirements"> 
                            <input type="hidden" name="requirements[]" value="{{ intval($requirement->id) }}" class="form-control {{ $errors->has('requirements') ? 'is-invalid' : ''}}" id="requirements" autocomplete="off">
                            <input type="text" name="requirements[]" disabled value="{{ $requirement->name }}" class="form-control {{ $errors->has('requirements') ? 'is-invalid' : ''}}" id="requirements" autocomplete="off">
                        </div>
                            <label>&nbsp;</label>
                            {!! $errors->first('requirements', '<span class="invalid-feedback">:message</span>') !!}
                        </div>
                    </div>
                    <div class="form-group col-md-2"  style="margin-top:1%;">
                            <br>
                            <a href="{{ route('requirement.edit', $requirement->id) }}" disabled class="form-control btn btn-warning btn-sm" style="color:white;">Edit</a>                    
                            <br>
                            <form action="{{ route('requirement.destroy', $requirement->id) }}" method="post">
                                @method('DELETE')
                                @csrf
                                    <input class="btn btn-danger btn-sm" type="submit" value="Delete" />
                            </form>
                        </div>
                    @endforeach
                </div>

<hr>
        
                <form action=" {{ route('jobvacancyupdate', $job->id) }} " method="post">
                @method('PUT')
                @csrf
                <div class="row">
                    <div class="form-group col-md-4">
                        <label>Tanggal Mulai</label>
                        <input type="date" value="{{ $job->start->toDateString() }}" name="start" class="form-control {{ $errors->has('start') ? 'is-invalid' : ''}}" id="start" autocomplete="off">
                        {!! $errors->first('start', '<span class="invalid-feedback">:message</span>') !!}
                    </div>
                    <div class="form-group col-md-4">
                        <label>Tanggal Berakhir</label>
                        <input type="date" value="{{ $job->end->toDateString() }}" name="end" class="form-control {{ $errors->has('end') ? 'is-invalid' : ''}}" id="end" autocomplete="off">
                        {!! $errors->first('end', '<span class="invalid-feedback">:message</span>') !!}
                    </div>
                    <div class="form-group col-md-4">
                        <label>Bagian</label>
                        <input type="text" value="{{ $job->name }}" name="name" class="form-control {{ $errors->has('name') ? 'is-invalid' : ''}}" id="name" autocomplete="off">
                        {!! $errors->first('name', '<span class="invalid-feedback">:message</span>') !!}
                    </div>
                </div>

                

                <div class="row">
                    <div class="form-group col-md-4">
                        <label>Persyaratan Pelamar</label>
                        <div id="plusrec">
                            <input type="text" name="requirements[]" value="" class="form-control {{ $errors->has('requirements') ? 'is-invalid' : ''}}" id="requirements" autocomplete="off">
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
                            <input type="text" name="criterias[]" value="" class="form-control {{ $errors->has('criterias') ? 'is-invalid' : ''}}" id="criterias" autocomplete="off">
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
                {{-- @endforeach --}}

                <div class="row">
                    <div class="form-group col-md-4">
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </div>
            </form>

        </div>
    </div>
</div>
@endsection


@section('scripts')

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

<script>
    $(document).on('click', '.rmv-trs', function () {
       $('#firstOne').remove();
       $('#firstSec').remove();
    });
</script>

<script>
    $(document).on('click', '.rmve-trs', function () {
        $('#secondOne').remove();
        $('#secondTwo').remove();
    });
</script>

@endsection