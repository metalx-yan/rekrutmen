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
                        <th>Status Pernikahan</th>
                        <th>Agama</th>
                        <th>Email</th>
                        <th>Nilai</th>
                        <th>Penilaian</th>
                    </thead>

                    <tbody>
                        @foreach ($applicants as $applicant)
                        <tr>
                                {{-- {{ $applicant }} --}}
                                <td> {{ $applicant->name }} </td>
                                <td> {{ $applicant->date_of_birth->format('d-m-Y') }} </td>
                                <td> {{ $applicant->telp }} </td>
                                <td> {{ $applicant->gender == 0 ? 'Laki-Laki' : 'Perempuan' }}</td>
                                <td> {{ $applicant->religion }} </td>
                                <td> {{ $applicant->email }} </td>
                                <td> {{ is_null($applicant->assessment->interview) ? '' : $applicant->assessment->total }} </td>
                                {{-- <td> {{ $applicant->assessment->total != null ?  $applicant->assessment->total : ''}} </td> --}}
                                <td> @if (is_null($applicant->assessment->interview))
                                        <a href="{{ route('list.app', $applicant->id) }}" class="btn btn-primary btn-sm">Enter</a>
                                    @else
                                        
                                    @endif
                                </td>
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

@endsection