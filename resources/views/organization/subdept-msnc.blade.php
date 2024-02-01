@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="card">

                <div class="card-header">
                    <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
{{--                               @if($hod)--}}
{{--                                    <a href="" class="btn btn-sm btn-success text-bold"><i class="fa fa-crown"></i>CURRENT HOD: {{$hod->staff->name}}</a>--}}
{{--                                @endif--}}
                            </span>


                    </div>
                </div>
                <div class="card-body table-responsive">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead >
                        <tr>
                            <th>S/N</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Rank</th>
                            <th>Email</th>
                            <th>Sub Dept HOD</th>
                            <th>Department</th>
                            <th>Sub Department</th>

                        </tr>
                        </thead>
                        <tbody>

                        @foreach ($users as $i=> $user)
                            <tr>
                                <td>{{++$i}}</td>
                                <td>{{$user->user->firstName}}</td>
                                <td>{{$user->user->lastName}}</td>
                                <td>{{$user->user->level->rank?? 'null'}}</td>
                                <td>{{$user->user->emailAddress}}</td>

                                <td>
{{--                                    @if ($hod && $user->user_id == $hod->sub_dept_staff_id)--}}
{{--                                        <a href="" class="btn btn-sm btn-success"><i class="fa fa-crown"></i> HOD</a>--}}
{{--                                    @else--}}
                                        <a href="{{route('assignMsncHod', encrypt($user->user_id))}}" class="btn btn-sm btn-primary"><i class="fa fa-user-tie"></i> Assign HOD</a>
{{--                                    @endif--}}
                                </td>
                                <td>{{$user->station->deptName?? 'null'}}</td>
                                <td>  {{$user->subdepartment->name}} </td>

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

