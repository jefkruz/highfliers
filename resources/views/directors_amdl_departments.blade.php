@extends('layouts.admin')

@section('content')
    <div class="row">
    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-blue">
            <div class="inner">
                <a href=" {{route('directorStaffAmdl',encrypt($department->id))}}">
                <h3 class="text-white">{{$staff->count()}}</h3>

                <p class="text-white">Staff Members </p>
                </a>
            </div>
            <a href=" {{route('directorStaffAmdl',encrypt($department->id))}}">
            <div class="icon">
                <i class="fa fa-people-roof"></i>
            </div>
            </a>
            <a href=" {{route('directorStaffAmdl',encrypt($department->id))}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-warning">
            <div class="inner">
                <a href=" {{route('rankAmdlDept',encrypt($department->id))}}">
                    <h3 class="text-dark"><i class="fa fa-spin"></i></h3>

                <p class="text-dark">Staff Ranks</p>
                </a>
            </div>
            <a href=" {{route('rankAmdlDept',encrypt($department->id))}}">
            <div class="icon">
                <i class="fa fa-layer-group"></i>
            </div>
            </a>
            <a href=" {{route('rankAmdlDept',encrypt($department->id))}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
                <div class="inner">
                    <a href=" {{route('subdepartments.create',encrypt($department->id))}}">
                        <h3 class="text-white">{{$amdlunits}}</h3>

                        <p class="text-white"> Sub Departments</p>
                    </a>
                </div>
                <a href=" {{route('subdepartments.create',encrypt($department->id))}}">
                    <div class="icon">
                        <i class="fa fa-rectangle-list"></i>
                    </div>
                </a>
                <a href=" {{route('subdepartments.create',encrypt($department->id))}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-success">
            <div class="inner">
                <a href="{{route('amdlSdms')}}">
                <h3 class="text-white">{{$sdms->count()}}</h3>

                <p class="text-white">SDM/Admin</p>
                </a>
            </div>
            <a href="{{route('amdlSdms')}}">
            <div class="icon">
                <i class="fa fa-people-roof"></i>
            </div>
            </a>
            <a href="{{route('amdlSdms')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-pink">
            <div class="inner">
                <a href="{{route('amdlHrs')}}">
                <h3 class="text-white">{{$hrs->count()}}</h3>

                <p class="text-white">HR Managers</p>
                </a>
            </div>
            <a href="{{route('amdlHrs')}}">
            <div class="icon">
                <i class="fa fa-users"></i>
            </div>
            </a>
            <a href="{{route('amdlHrs')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>

        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-purple">
                <div class="inner">
                    <a href="{{route('amdlSupervisors')}}">
                    <h3 class="text-white">{{$supervisors->count()}}</h3>

                    <p class="text-white">Supervisors</p>
                    </a>
                </div>
                <a href="{{route('amdlSupervisors')}}">
                <div class="icon">
                    <i class="fa fa-users"></i>
                </div>
                </a>
                <a href="{{route('amdlSupervisors')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
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
{{--                <a href="{{route('alldept')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>--}}
{{--            </div>--}}
{{--        </div>--}}
    </div>

@endsection
