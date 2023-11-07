@extends('layouts.admin')

@section('content')
    <div class="row">
        @if(session('role')== 'admin')

            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-blue">

                    <div class="inner">
                        <a href="{{route('organizations.index')}}">
                        <h3 class="text-white">{{$organization->count()}}</h3>

                        <p class="text-white">AMDL HQ Departments </p>
                        </a>
                    </div>
                    <a href="{{route('organizations.index')}}">
                    <div class="icon">
                        <i class="fa fa-people-roof"></i>
                    </div>
                    </a>
                    <a href="{{route('organizations.index')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>

                </div>

            </div>

{{--            <div class="col-lg-3 col-6">--}}
{{--                <!-- small box -->--}}
{{--                <div class="small-box bg-success">--}}
{{--                    <div class="inner">--}}
{{--                        <h3>{{$station->count()}}</h3>--}}

{{--                        <p>Mission Stations (MSNC)</p>--}}
{{--                    </div>--}}
{{--                    <div class="icon">--}}
{{--                        <i class="fa fa-people-roof"></i>--}}
{{--                    </div>--}}
{{--                    <a href="{{route('stations.index')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>--}}
{{--                </div>--}}
{{--            </div>--}}
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-warning">
                    <div class="inner">
                        <a href="{{route('alldept')}}">
                        <h3 class="text-dark">{{$msncOffice}}</h3>

                        <p class="text-dark">MSNC HQ departments</p>
                        </a>
                    </div>
                    <a href="{{route('alldept')}}">
                    <div class="icon">
                        <i class="fa fa-building"></i>
                    </div>
                    </a>
                    <a href="{{route('alldept')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-gradient-fuchsia">
                    <div class="inner">
                        <a href="{{route('allstaffamdl')}}">
                        <h3 class="text-white">{{$amdlStaff}}</h3>

                        <p class="text-white">AMDL HQ Staff</p>
                        </a>
                    </div>
                    <a href="{{route('allstaffamdl')}}">
                    <div class="icon">
                        <i class="fa fa-users-line"></i>
                    </div>
                    </a>
                    <a href="{{route('allstaffamdl')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-danger">
                    <div class="inner">
                        <a href="{{route('allstaffmsnc')}}">
                        <h3 class="text-white">{{$msncStaff}}</h3>

                        <p class="text-white">MSNC HQ Staff </p>
                        </a>
                    </div>
                    <a href="{{route('allstaffmsnc')}}">
                    <div class="icon">
                        <i class="fa fa-users-line"></i>
                    </div>
                    </a>
                    <a href="{{route('allstaffmsnc')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-lightblue">
                    <div class="inner">
                        <a href="{{route('amdlRank')}}">
                        <h3 class="text-white">{{$amdlRank}}</h3>

                        <p class="text-white">AMDL Ranks</p>
                        </a>
                    </div>
                    <a href="{{route('amdlRank')}}">
                    <div class="icon">
                        <i class="fa fa-certificate text-white"></i>
                    </div>
                    </a>
                    <a href="{{route('amdlRank')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-purple">
                    <div class="inner">
                        <a href="{{route('msncRank')}}">
                        <h3 class="text-white">{{$msncRank}}</h3>

                        <p class="text-white">MSNC Ranks</p>
                        </a>
                    </div>
                    <a href="{{route('msncRank')}}">
                    <div class="icon">
                        <i class="fa fa-certificate text-white"></i>
                    </div>
                    </a>

                    <a href="{{route('msncRank')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>


            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-gradient-primary">
                    <div class="inner">
                        <a href="{{route('directors')}}">
                        <h3 class="text-white">{{$directors}}</h3>

                        <p class="text-white"> Directors</p>
                        </a>
                    </div>
                    <a href="{{route('directors')}}">
                    <div class="icon">
                        <i class="fas fa-user "></i>
                    </div>
                    </a>
                    <a href="{{route('directors')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-gradient-success">
                    <div class="inner">
                        <a href="{{route('sdms')}}">
                        <h3 class="text-white">{{$sdms}}</h3>

                        <p class="text-white"> SDM/Admin</p>
                        </a>
                    </div>
                    <a href="{{route('sdms')}}">
                    <div class="icon">
                        <i class="fas fa-user "></i>
                    </div>
                    </a>
                    <a href="{{route('sdms')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-gradient-danger">
                    <div class="inner">
                        <a href="{{route('hrs')}}">
                        <h3 class="text-white">{{$hrs}}</h3>

                        <p class="text-white">HR Managers</p>
                        </a>
                    </div>
                    <a href="{{route('hrs')}}">
                    <div class="icon">
                        <i class="fas fa-user "></i>
                    </div>
                    </a>
                    <a href="{{route('hrs')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-gradient-secondary">
                    <div class="inner">
                        <a href="{{route('sdms')}}">
                        <h3 class="text-white">{{$supervisors}}</h3>

                        <p class="text-white"> Supervisors</p>
                        </a>
                    </div>
                    <div class="icon">
                        <i class="fas fa-user "></i>
                    </div>
                    <a href="{{route('sdms')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-info">
                    <div class="inner">
                        <a href="{{route('admins.index')}}">
                        <h3 class="text-white">{{$admins}}</h3>

                        <p class="text-white">Administrators</p>
                        </a>
                    </div>
                    <a href="{{route('admins.index')}}">
                    <div class="icon">
                        <i class="fas fa-users-rectangle"></i>
                    </div>
                    </a>
                    <a href="{{route('admins.index')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
        @endif


            @if(session('role')== 'director')

                    @foreach($amdl as $department)

                    <div class="col-lg-3 col-6">
                    <!-- small box -->
                        <div class="small-box bg-blue">

                            <div class="inner">
                                <a href="{{route('directorsDepartmentAmdl',encrypt($department->organization->id))}}">
                            <h3 class="text-white">{{$department->organization->seeker->count() ?? ''}} </h3>

                            <p class="text-white"> {{$department->organization->name ?? '' }} </p>
                                </a>
                        </div>
                            <a href="{{route('directorsDepartmentAmdl',encrypt($department->organization->id))}}">
                        <div class="icon">

                            <i class="fa fa-people-roof"></i>
                        </div>
                            </a>
                        <a href="{{route('directorsDepartmentAmdl',encrypt($department->organization->id))}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>

                    </div>

                </div>

                    @endforeach

                    @foreach($msnc as $msncstaff)
                        <div class="col-lg-3 col-6">
                            <!-- small box -->
                            <div class="small-box bg-blue">
                                <div class="inner">
                                    <a href="{{route('directorsDepartmentMsnc',encrypt($msncstaff->department->deptID))}}">
                                    <h3 class="text-white">{{$msncstaff->department->tblUser->count() ?? ''}} </h3>

                                    <p class="text-white"> {{$msncstaff->department->deptName ?? '' }} </p>
                                    </a>
                                </div>
                                <a href="{{route('directorsDepartmentMsnc',encrypt($msncstaff->department->deptID))}}">
                                <div class="icon">
                                    <i class="fa fa-people-roof"></i>
                                </div>
                                </a>
                                <a href="{{route('directorsDepartmentMsnc',encrypt($msncstaff->department->deptID))}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                    @endforeach
            @endif


            @if(session('role')== 'sdm')

                @foreach($amdl as $department)

                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-blue">

                            <div class="inner">
                                <a href="{{route('directorStaffAmdl',encrypt($department->organization->id))}}">
                                    <h3 class="text-white">{{$department->organization->seeker->count() ?? ''}} </h3>

                                    <p class="text-white"> {{$department->organization->name ?? '' }} </p>
                                </a>
                            </div>
                            <a href="{{route('directorStaffAmdl',encrypt($department->organization->id))}}">
                                <div class="icon">

                                    <i class="fa fa-people-roof"></i>
                                </div>
                            </a>
                            <a href="{{route('directorStaffAmdl',encrypt($department->organization->id))}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>

                        </div>

                    </div>

                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-success">
                            <div class="inner">
                                <a href=" {{route('rankAmdlDept',encrypt($department->organization->id))}}">
                                    <h3 class="text-white"><i class="fa fa-spin"></i></h3>

                                    <p class="text-white">{{$department->organization->name ?? '' }} Staff Ranks</p>
                                </a>
                            </div>
                            <a href=" {{route('rankAmdlDept',encrypt($department->organization->id))}}">
                                <div class="icon">
                                    <i class="fa fa-layer-group"></i>
                                </div>
                            </a>
                            <a href=" {{route('rankAmdlDept',encrypt($department->organization->id))}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                @endforeach

                @foreach($msnc as $msncstaff)
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-blue">
                            <div class="inner">
                                <a href="{{route('directorsDepartmentMsnc',encrypt($msncstaff->department->deptID))}}">
                                    <h3 class="text-white">{{$msncstaff->department->tblUser->count() ?? ''}} </h3>

                                    <p class="text-white"> {{$msncstaff->department->deptName ?? '' }} </p>
                                </a>
                            </div>
                            <a href="{{route('directorsDepartmentMsnc',encrypt($msncstaff->department->deptID))}}">
                                <div class="icon">
                                    <i class="fa fa-people-roof"></i>
                                </div>
                            </a>
                            <a href="{{route('directorsDepartmentMsnc',encrypt($msncstaff->department->deptID))}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                @endforeach


            @endif

            @can('isSupervisor')
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-blue">
                        <div class="inner">
                            <h3>{{$staff ?? ''}}</h3>

                            <p>Staff </p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-users"></i>
                        </div>
                        <a href="/supervisorStaff" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3>{{$director_org?? ''}}</h3>

                            <p>Appraisals </p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-people-roof"></i>
                        </div>
                        <a href="/directororg" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>


            @endcan

            @can('isHr')
                <div class="col-md-4">
                    <a href="/directorstaffamdl" >
                        <div class="card mini-stats-wid">
                            <div class="card-body">
                                <div class="media">
                                    <div class="media-body">
                                        <p class="text-muted fw-medium">Staff</p>
                                        <h4 class="mb-0">{{$director_seeker}}</h4>
                                    </div>

                                    <div class="avatar-sm rounded-circle bg-primary align-self-center mini-stat-icon">
                                    <span class="avatar-title rounded-circle bg-primary">
                                        <i class="bx bx-user font-size-24"></i>
                                    </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-md-4">
                    <a href="/directororg" >
                        <div class="card mini-stats-wid">
                            <div class="card-body">
                                <div class="media">
                                    <div class="media-body">
                                        <p class="text-muted fw-medium">Appraisals</p>
                                        <h4 class="mb-0">{{$director_org?? ''}}</h4>
                                    </div>

                                    <div class="avatar-sm rounded-circle bg-primary align-self-center mini-stat-icon">
                                    <span class="avatar-title rounded-circle bg-primary">
                                        <i class="bx bx-user font-size-24"></i>
                                    </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            @endcan
    </div>
@endsection
