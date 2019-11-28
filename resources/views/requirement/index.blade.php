@extends('main')

@section('content')
<div class="container-fluid">
       
        <div class="row page-titles">
            <div class="col-md-6 col-8 align-self-center">
                <h3 class="text-themecolor m-b-0 m-t-0">Dashboard</h3>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                    <li class="breadcrumb-item active">Requirement</li>
                    <li class="breadcrumb-item active">List</li>
                </ol>
            </div>
        </div>
        <div class="card">
            <div class="card-title">
                
            </div>
            <div class="card-body">
                <table class="table border" id="myTable">
                    <thead>
                        <th>Id</th>
                        <th>Nama</th>
                    </thead>

                    <tbody>
                        @foreach ($requirements as $requirement)
                        {{-- {{ $requirement }} --}}
                            @if ($requirement->job_vacancy->end->format('d-m-Y') == Carbon\Carbon::now()->format('d-m-Y'))
                                    
                            @else
                            <tr>
                                <td> {{ $requirement->id }} </td>
                                <td> {{ $requirement->name }} </td>
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

@endsection