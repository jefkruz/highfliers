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
                    <h3 class="text-white"><i class="fa fa-spin"></i></h3>

                <p class="text-white">Staff Ranks</p>
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
            <div class="small-box bg-orange">
                <div class="inner">
                    <a href="{{route('reviews.years',encrypt($department->id))}}">
                        <h3 class="text-white">{{$reviews->count()}}</h3>

                        <p class="text-white">Reviews</p>
                    </a>
                </div>
                <a href="{{route('reviews.years',encrypt($department->id))}}">
                    <div class="icon">

                        <i class="fa fa-magnifying-glass"></i>
                    </div>
                </a>
                <a href="{{route('reviews.years',encrypt($department->id))}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
                <div class="inner">
                    <a href="{{route('grade.index',encrypt($department->id))}}">
                        <h3 class="text-white">{{$grades->count()}}</h3>

                        <p class="text-white">Historical & Current Grades</p>
                    </a>
                </div>
                <a href="{{route('grade.index',encrypt($department->id))}}">
                    <div class="icon">

                        <i class="fa fa-graduation-cap"></i>
                    </div>
                </a>
                <a href="{{route('grade.index',encrypt($department->id))}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>


        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
                <div class="inner">
                    <a href=" {{route('probation.index',encrypt($department->id))}}">
                        <h3 class="text-white">{{$probation}}</h3>

                        <p class="text-white"> Probation  For New Recruits</p>
                    </a>
                </div>
                <a href=" {{route('probation.index',encrypt($department->id))}}">
                    <div class="icon">
                        <i class="fa fa-users"></i>
                    </div>
                </a>
                <a href=" {{route('probation.index',encrypt($department->id))}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>







    </div>

@endsection
