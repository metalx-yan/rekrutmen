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
               
            </div>
            <div class="card-body">
                <table class="table border" id="myTable" style="font-size:14px;" >
                    <thead>
                        <th>Nama</th>
                        <th>Tanggal Lahir</th>
                        <th>Telepon</th>
                        <th>Jenis Kelamin</th>
                        <th>Agama</th>
                        <th>Email</th>
                        <th>Nilai</th>
                        <th>Status</th>
                    </thead>

                    <tbody>
                        @foreach ($applicants as $applicant)
                            @if (isset($applicant->assessment->total))
                                @if ($applicant->assessment->total >= 80)
                                    
                                <tr>
                                    {{-- <form action="{{ route('send.email') }}" method="post"> --}}
                                            {{-- @csrf --}}
                                {{-- {{ $applicant }} --}}
                                    <td> <input type="hidden" name="name" id="" hidden value="{{$applicant->name}}"> {{ $applicant->name }} </td>
                                    <td> {{ $applicant->date_of_birth->format('d-m-Y') }} </td>
                                    <td> {{ $applicant->telp }} </td>
                                    <td> {{ $applicant->gender == 0 ? 'Laki-Laki' : 'Perempuan' }}</td>
                                    <td> {{ $applicant->religion }} </td>
                                    <td> <input  name="email" id="" hidden value="{{$applicant->email}}"> {{ $applicant->email }} </td>
                                    <td> <input  name="total" hidden value="{{$applicant->assessment->total}}"> {{ is_null($applicant->assessment) ? '' : $applicant->assessment->total }} </td>
                                    <td> {!! $applicant->assessment->total <= 80 ? '<span class="badge badge-danger">Belum Lulus</span>' : '<span class="badge badge-success">Lulus</span>'  !!}</td>
            
                                {{-- </form> --}}
                                </tr>
                                @endif
                            @else
                                
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
    <script src="https://cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.print.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.html5.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>

    <script>
        $(document).ready( function () {
            $('#myTable').DataTable({
                dom: 'Bfrtip',
                buttons: [
                    'copy', 'csv', 'excel', 'pdf', 'print'
                ]
            } );
        } );
    </script>

@endsection