@extends('layouts.admin')

@section('content')

    <div class="row">
        <div class="col-sm-12">
            <div class="card">


                <div class="card-body table-responsive">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead >
                        <tr>
                            <th>S/N</th>

                            <th>Staff Name </th>
                            <th>Rank</th>
                            <th>Salary</th>
                            <th>Department</th>
                            <th>Date of Review </th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach ($reviews as $i=> $user)

                            <tr>
                                <td>{{ ++$i }}</td>


                                <td>{{$user->seeker->first_name .' '.$user->seeker->last_name}}</td>

                                <td>{{ $user->rank->rank }}</td>
                                <td>₦ {{ number_format($user->salary, 2) }} </td>
                                <td>{{ $user->Organization->name }}</td>
                                <td>{{ date("jS F, Y", strtotime($user->date_of_review)) }}</td>


                                <td>
                                    <a class="btn btn-sm btn-primary " href="{{route('staffReviewAmdl', encrypt($user->seeker_id))}}"></i> Manage</a>

                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>

            </div>

        </div>
    </div>
@endsection



@section('style')
    <link rel="stylesheet" href="{{asset('admin_assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('admin_assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('admin_assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">


@endsection

@section('script')
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <!-- DataTables  & Plugins -->

    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap4.min.js"></script>

    <script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>

    <script src="https://cdn.datatables.net/responsive/2.2.9/js/responsive.bootstrap4.min.js"></script>

    <script src="https://cdn.datatables.net/buttons/2.0.1/js/dataTables.buttons.min.js"></script>

    <script src="https://cdn.datatables.net/buttons/2.0.1/js/buttons.bootstrap4.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.70/pdfmake.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.70/vfs_fonts.js"></script>

    <script src="https://cdn.datatables.net/buttons/2.0.1/js/buttons.html5.min.js"></script>

    <script src="https://cdn.datatables.net/buttons/2.0.1/js/buttons.print.min.js"></script>

    <script src="https://cdn.datatables.net/buttons/2.0.1/js/buttons.colVis.min.js"></script>

    <script>
        $(function () {
            $("#example1").DataTable({
                "responsive": true, "lengthChange": false, "autoWidth": false,
                "buttons": [ "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');

        });
    </script>
@endsection
