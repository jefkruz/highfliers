@extends('layouts.admin')

@section('content')
    <div class="row">
    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-blue">
            <div class="inner">
                <a href=" {{route('probationStaffMsnc',encrypt($station_id))}}">
                <h3 class="text-white">{{$staff}}</h3>

                <p class="text-white">Probation Staffs </p>
                </a>
            </div>
            <a href=" {{route('probationStaffMsnc',encrypt($station_id))}}">
            <div class="icon">
                <i class="fa fa-users-rectangle"></i>
            </div>
            </a>
            <a href=" {{route('probationStaffMsnc',encrypt($station_id))}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>

        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
                <div class="inner">
                    <a href=" {{route('subdepartments.msncindex',encrypt($station_id))}}">
                        <h3 class="text-white">{{$msncunits}}</h3>

                        <p class="text-white"> Units</p>
                    </a>
                </div>
                <a href=" {{route('subdepartments.msncindex',encrypt($station_id))}}">
                    <div class="icon">
                        <i class="fa fa-rectangle-list"></i>
                    </div>
                </a>
                <a href=" {{route('subdepartments.msncindex',encrypt($station_id))}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>




        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-purple">
                <div class="inner">
                    <a href="{{route('amdlSupervisors')}}">
                        <h3 class="text-white">{{$supervisors->count()}}</h3>

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
