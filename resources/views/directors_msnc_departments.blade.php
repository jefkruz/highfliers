@extends('layouts.admin')

@section('content')
    <div class="row">
    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-blue">
            <div class="inner">
                <a href=" {{route('directorStaffMsnc',encrypt($department->deptID))}}">
                <h3 class="text-white">{{$staff->count()}}</h3>

                <p class="text-white">Staff Members </p>
                </a>
            </div>
            <a href=" {{route('directorStaffMsnc',encrypt($department->deptID))}}">
            <div class="icon">
                <i class="fa fa-people-roof"></i>
            </div>
            </a>
            <a href="{{route('directorStaffMsnc',encrypt($department->deptID))}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
                <div class="inner">
                    <a href=" {{route('rankMsncDept',encrypt($department->deptID))}}">
                        <h3 class="text-dark"><i class="fa fa-spin"></i></h3>

                        <p class="text-dark">Staff Ranks</p>
                    </a>
                </div>
                <a href=" {{route('rankMsncDept',encrypt($department->deptID))}}">
                    <div class="icon">
                        <i class="fa fa-layer-group"></i>
                    </div>
                </a>
                <a href=" {{route('rankMsncDept',encrypt($department->deptID))}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
                <div class="inner">
                    <a href=" {{route('subdepartments.createMsnc',encrypt($department->deptID))}}">
                        <h3 class="text-white">{{$msncunits}}</h3>

                        <p class="text-white">{{$department->deptName ?? '' }}  Sub Departments</p>
                    </a>
                </div>
                <a href=" {{route('subdepartments.createMsnc',encrypt($department->deptID))}}">
                    <div class="icon">
                        <i class="fa fa-rectangle-list"></i>
                    </div>
                </a>
                <a href=" {{route('subdepartments.createMsnc',encrypt($department->deptID))}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-success">
            <div class="inner">
                <h3>{{$sdms->count()}}</h3>

                <p>SDM/Admin</p>
            </div>
            <div class="icon">
                <i class="fa fa-people-roof"></i>
            </div>
            <a href="{{route('msncSdms')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-pink">
            <div class="inner">
                <h3>{{$hrs->count()}}</h3>

                <p>HR Managers</p>
            </div>
            <div class="icon">
                <i class="fa fa-users"></i>
            </div>
            <a href="{{route('msncHrs')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-purple">
                <div class="inner">
                    <h3>{{$supervisors->count()}}</h3>

                    <p>Supervisors</p>
                </div>
                <div class="icon">
                    <i class="fa fa-users"></i>
                </div>
                <a href="{{route('msncSupervisors')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
{{--        <div class="col-lg-3 col-6">--}}
{{--            <!-- small box -->--}}
{{--            <div class="small-box bg-danger">--}}
{{--                <div class="inner">--}}
{{--                    <h3></h3>--}}

{{--                    <p>Pending Staff</p>--}}
{{--                </div>--}}
{{--                <div class="icon">--}}
{{--                    <i class="fa fa-users"></i>--}}
{{--                </div>--}}
{{--                <a href="" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>--}}
{{--            </div>--}}
{{--        </div>--}}
    </div>

@endsection
