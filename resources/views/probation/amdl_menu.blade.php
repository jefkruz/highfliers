@extends('layouts.admin')

@section('content')

    <h3 > <b> Tracking of Probation Period for New Recruits </b></h3>
    <br>
    <div class="row">
    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-blue">
            <div class="inner">
                <a href=" {{route('probationStaffAmdl',encrypt($department_id))}}">
                <h3 class="text-white">{{$staff}}</h3>

                <p class="text-white"> Staff </p>
                </a>
            </div>
            <a href=" {{route('probationStaffAmdl',encrypt($department_id))}}">
            <div class="icon">
                <i class="fa fa-users-rectangle"></i>
            </div>
            </a>
            <a href=" {{route('probationStaffAmdl',encrypt($department_id))}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>

        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
                <div class="inner">
                    <a href=" {{route('subdepartments.index',encrypt($department_id))}}">
                        <h3 class="text-white">{{$amdlunits}}</h3>

                        <p class="text-white"> Units</p>
                    </a>
                </div>
                <a href=" {{route('subdepartments.index',encrypt($department_id))}}">
                    <div class="icon">
                        <i class="fa fa-rectangle-list"></i>
                    </div>
                </a>
                <a href=" {{route('subdepartments.index',encrypt($department_id))}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>


{{--        <div class="col-lg-3 col-6">--}}
{{--            <!-- small box -->--}}
{{--            <div class="small-box bg-pink">--}}
{{--                <div class="inner">--}}
{{--                    <a href="{{route('amdlHrs')}}">--}}
{{--                        <h3 class="text-white">{{$hrs}}</h3>--}}

{{--                        <p class="text-white">Payroll Managers</p>--}}
{{--                    </a>--}}
{{--                </div>--}}
{{--                <a href="{{route('amdlHrs')}}">--}}
{{--                    <div class="icon">--}}
{{--                        <i class="fa fa-users"></i>--}}
{{--                    </div>--}}
{{--                </a>--}}
{{--                <a href="{{route('amdlHrs')}}" class="small-box-footer text-white">More info <i class="fas fa-arrow-circle-right"></i></a>--}}
{{--            </div>--}}
{{--        </div>--}}


        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-purple">
                <div class="inner">
                    <a href="{{route('amdlSupervisors')}}">
                        <h3 class="text-white">{{$supervisors}}</h3>

                        <p class="text-white">HODs/Supervisors</p>
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



    </div>

@endsection
