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
                        <th>Kirim Surat Panggilan</th>
                    </thead>

                    <tbody>
                        @foreach ($applicants as $applicant)
                        <tr>
                                <form action="{{ route('send.email.qualification') }}" method="post">
                                        @csrf
                                <input type="hidden" name="job" id="" hidden value="{{$applicant->job_vacancy->id}}">
                                <input type="hidden" name="job_vacancy" id="" hidden value="{{$applicant->job_vacancy->interviewdate}}">
                                <input type="hidden" name="job_time" id="" hidden value="{{$applicant->job_vacancy->interviewtime}}">
                                <input type="hidden" name="username" id="" hidden value="{{$applicant->user_id}}">
                                <input type="hidden" name="posisi" id="" hidden value="{{$applicant->job_vacancy->name}}">
                                <td> <input type="hidden" name="name" id="" hidden value="{{$applicant->name}}"> {{ $applicant->name }} </td>
                                <td> {{ $applicant->date_of_birth->format('d-m-Y') }} </td>
                                <td> <input type="hidden" name="telp" id="" hidden value="{{$applicant->telp}}"> {{ $applicant->telp }} </td>
                                <td> {{ $applicant->gender == 0 ? 'Laki-Laki' : 'Perempuan' }}</td>
                                <td> {{ $applicant->religion }} </td>
                                <td> <input  name="email" id="" hidden value="{{$applicant->email}}"> {{ $applicant->email }} </td>
                                    <td>
                                        <input type="submit" value="Enter" class="btn btn-success btn-sm">
                                    </td>

                                </form>
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