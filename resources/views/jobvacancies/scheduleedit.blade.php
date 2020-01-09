@extends('main')

@section('content')
<div class="container-fluid">
       
        <div class="row page-titles">
            <div class="col-md-6 col-8 align-self-center">
                <h3 class="text-themecolor m-b-0 m-t-0">Dashboard</h3>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                    <li class="breadcrumb-item active">Update</li>
                    <li class="breadcrumb-item active">Schedule</li>
                </ol>
            </div>
        </div>
        <div class="card">
            <div class="card-title">

                
            </div>
            <div class="card-body">
                    <form action=" {{ route('schedule.edit.job', $job->id) }} " method="post">
                            @method('PUT')
                            @csrf
                            <div class="row">
                                <div class="form-group col-md-4">
                                    <label>Tanggal Wawancara</label>
                                    <input type="date" value="{{ Carbon\Carbon::createFromDate($job->inteviewdate)->format('Y-m-d') }}" name="interviewdate" class="form-control {{ $errors->has('interviewdate') ? 'is-invalid' : ''}}" id="interviewdate" autocomplete="off">
                                    {!! $errors->first('interviewdate', '<span class="invalid-feedback">:message</span>') !!}
                                </div>
                                <div class="form-group col-md-4">
                                    <label> Waktu Wawancara</label>
                                    <input type="time" value="{{ $job->interviewtime }}" name="interviewtime" class="form-control {{ $errors->has('interviewtime') ? 'is-invalid' : ''}}" id="interviewtime" autocomplete="off">
                                    {!! $errors->first('interviewtime', '<span class="invalid-feedback">:message</span>') !!}
                                </div>
                                <div class="form-group col-md-4">
                                    <label>Tempat Wawancara</label>
                                    <input type="text" value="{{ $job->room }}" name="room" class="form-control {{ $errors->has('room') ? 'is-invalid' : ''}}" id="room" autocomplete="off">
                                    {!! $errors->first('room', '<span class="invalid-feedback">:message</span>') !!}
                                </div>
                            </div>

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