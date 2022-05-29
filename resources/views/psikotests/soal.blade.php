@extends('main')

@section('content')
<div class="container-fluid">
       
        <div class="row page-titles">
            <div class="col-md-6 col-8 align-self-center">
                <h3 class="text-themecolor m-b-0 m-t-0">Dashboard</h3>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                    <li class="breadcrumb-item active">Psikotest</li>
                    <li class="breadcrumb-item active">Soal</li>
                </ol>
            </div>
        </div>
        <div class="card">
            <div class="card-title">
                <br>
                
            </div>
            <div class="card-body">
                <form action="{{ route('answer.store') }}" method="post">
                    @csrf
                @php
                    $no = 1;
                    $arr = [];
                @endphp
                 @foreach ($soal as $item)
                    
                    @foreach ($item->answers as $id_u)
                        @php
                            $arr[] = $id_u->user_id;
                        @endphp
                    @endforeach
                    {{-- <span>{{ $item->answers. '-' . Auth::user()->id. '-' . in_array(Auth::user()->id, $arr) }}</span> --}}
                    @if (in_array(Auth::user()->id, $arr))
                    @php
                        $a= 'active';
                    @endphp
                    @else
                        <span>{{ $no++ }}. {{ ucfirst($item->question) }} : </span><br>
                        <input type="radio" id="html" name="answer_{{ $item->id }}" value="{{ $item->answer_a }}_{{ $item->id }}"> {{ $item->answer_a }}
                        <input type="radio" id="html" name="answer_{{ $item->id }}" value="{{ $item->answer_b }}_{{ $item->id }}"> {{ $item->answer_b }}
                        <input type="radio" id="html" name="answer_{{ $item->id }}" value="{{ $item->answer_c }}_{{ $item->id }}"> {{ $item->answer_c }}
                        <input type="radio" id="html" name="answer_{{ $item->id }}" value="{{ $item->answer_d }}_{{ $item->id }}"> {{ $item->answer_d }}
                        <input type="hidden" name="user" value="{{ Auth::user()->id }}">
                        <input type="hidden" name="job" value="{{ $item->jobvacancies[0] }}">
                        <br>
                        <hr>
                        @php
                            $a= 'non';
                        @endphp
                    @endif
                  
                @endforeach

                 @if ($a == 'active')
                     
                 @else
                 <button type="submit" class="btn btn-primary btn-sm">Submit</button>
                     
                 @endif
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