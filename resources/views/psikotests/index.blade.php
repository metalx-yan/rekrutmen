@extends('main')

@section('content')
<div class="container-fluid">
       
        <div class="row page-titles">
            <div class="col-md-6 col-8 align-self-center">
                <h3 class="text-themecolor m-b-0 m-t-0">Dashboard</h3>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                    <li class="breadcrumb-item active">Psikotest</li>
                    <li class="breadcrumb-item active">List</li>
                </ol>
            </div>
        </div>
        <div class="card">
            <div class="card-title">
                <br>
                <button type="button" class="btn btn-primary" style="margin-left: 20px;" data-toggle="modal" data-target="#exampleModal">
                    Create Psikotest
                </button>

                <div class="modal fade" id="exampleModal" data-keyboard="false" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-xl" role="document">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Create Psikotest</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body" >
                            <form action=" {{ route('psikotest.store') }} " method="post">
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
                                            <label>Lowongan</label>
                                            <select name="lowongan" id="" class="form-control  {{ $errors->has('lowongan') ? 'is-invalid' : ''}}">
                                                <option value="">Pilih Lowongan</option>
                                                @foreach ($job as $job)
                                                    @if (in_array($job->id,$vacancy))

                                                    @else
                                                    <option value="{{ $job->id }}">{{ $job->name }}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                            {!! $errors->first('lowongan', '<span class="invalid-feedback">:message</span>') !!}
                                        </div>
                                    </div>
                                    <input type="button" value="+" onclick="addRow()" required>
                                    <div id="content">
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
                        <th>Tanggal Mulai</th>
                        <th>Tanggal Berakhir</th>
                        <th>Lowongan</th>
                        {{-- <th>Action</th> --}}
                    </thead>

                    <tbody>
                        @foreach ($data as $job)
                            <tr>
                                <td>{{ $job->start }}</td>
                                <td>{{ $job->end }}</td>
                                <td>{{ $job->name }}</td>
                                {{-- <td></td> --}}
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
    <script>
        function addRow () {
            document.querySelector('#content').insertAdjacentHTML(
                'afterbegin',
                `<div class="row">
                    <div class="form-group col-md-12">
                        <textarea name="pertanyaan[]" id="" cols="30" rows="3" class="form-control" placeholder="Pertanyaan" required></textarea>
                    </div>
                    <div class="form-group col-md-2">
                        <input type="text" name="a[]"  class="form-control" placeholder="A" required />
                    </div>
                    <div class="form-group col-md-2">
                        <input type="text" name="b[]"  class="form-control" placeholder="B" required/>
                    </div>
                    <div class="form-group col-md-2">
                        <input type="text" name="c[]"  class="form-control" placeholder="C" required/>
                    </div>
                    <div class="form-group col-md-2">
                        <input type="text" name="d[]"  class="form-control" placeholder="D" required/>
                    </div>
                    <div class="form-group col-md-2">
                        <input type="text" name="jawaban[]"  class="form-control" placeholder="Jawaban" required/>
                    </div>
                    <input type="button" value="-" style="height:38px;" class="btn btn-primary" onclick="removeRow(this)">
                    <hr>
                </div>
                `
            )
        }

        function removeRow (input) {
            input.parentNode.remove()
        }   
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