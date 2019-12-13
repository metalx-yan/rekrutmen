@extends('main')

@section('content')
<div class="container-fluid">
       
        <div class="row page-titles">
            <div class="col-md-6 col-8 align-self-center">
                <h3 class="text-themecolor m-b-0 m-t-0">Dashboard</h3>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                    <li class="breadcrumb-item active">Update</li>
                    <li class="breadcrumb-item active">Criteria</li>
                </ol>
            </div>
        </div>
        <div class="card">

            <div class="card-body">

                    <form action="{{ route('criteria.update', $criteria->id) }}" method="post">
                            @method('PUT')
                            @csrf
                            <div class="row">
                                <div class="form-group col-md-4">
                                    <label>Nama</label>
                                    <input type="name" value="{{ $criteria->name }}" name="name" class="form-control {{ $errors->has('name') ? 'is-invalid' : ''}}" id="name" autocomplete="off">
                                    {!! $errors->first('name', '<span class="invalid-feedback">:message</span>') !!}
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="form-group col-md-4">
                                    <button type="submit" class="btn btn-primary">Update</button>
                                    <a href="{{ route('jobUpdate', $criteria->job_vacancy_id) }}" class="btn btn-success">Back</a>
                                </div>
                            </div>
                        </form>
            </div>
        </div>
@endsection