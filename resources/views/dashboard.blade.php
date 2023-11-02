@extends('layouts.admin')

@section('content')
    <div class="row">
        @if(session('role')== 'admin')
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-blue">
                    <div class="inner">
                        <h3>{{$organization->count()}}</h3>

                        <p>AMDL Organizations </p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-people-roof"></i>
                    </div>
                    <a href="{{route('organizations.index')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-success">
                    <div class="inner">
                        <h3>{{$station->count()}}</h3>

                        <p>Mission Stations (MSNC)</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-people-roof"></i>
                    </div>
                    <a href="{{route('stations.index')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-warning">
                    <div class="inner">
                        <h3>{{$msncOffice}}</h3>

                        <p>Group Offices (MSNC)</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-building"></i>
                    </div>
                    <a href="{{route('alldept')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>

            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-danger">
                    <div class="inner">
                        <h3>{{$msncStaff}}</h3>

                        <p>MSNC Staff </p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-users-line"></i>
                    </div>
                    <a href="{{route('allstaffmsnc')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-gradient-fuchsia">
                    <div class="inner">
                        <h3>{{$amdlStaff}}</h3>

                        <p>AMDL Staff</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-users-line"></i>
                    </div>
                    <a href="{{route('allstaffamdl')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-purple">
                    <div class="inner">
                        <h3>{{$msncRank}}</h3>

                        <p>MSNC Ranks</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-certificate text-white"></i>
                    </div>
                    <a href="{{route('allrank')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>

            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-lightblue">
                    <div class="inner">
                        <h3>{{$amdlRank}}</h3>

                        <p>AMDL Ranks</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-certificate text-white"></i>
                    </div>
                    <a href="{{route('allrankamdl')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-gradient-primary">
                    <div class="inner">
                        <h3>{{$directors}}</h3>

                        <p> Directors</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-user "></i>
                    </div>
                    <a href="{{route('directors')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-gradient-success">
                    <div class="inner">
                        <h3>{{$sdms}}</h3>

                        <p> SDM Admins</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-user "></i>
                    </div>
                    <a href="{{route('sdms')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-gradient-danger">
                    <div class="inner">
                        <h3>{{$hrs}}</h3>

                        <p>HR Managers</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-user "></i>
                    </div>
                    <a href="{{route('hrs')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-gradient-secondary">
                    <div class="inner">
                        <h3>{{$supervisors}}</h3>

                        <p> Supervisors</p>
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
                        <h3>{{$admins}}</h3>

                        <p>Administrators</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-users-rectangle"></i>
                    </div>
                    <a href="{{route('admins.index')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
        @endif


            @if(session('role')== 'director')
{{--{{dd($amdl[1]->organization->name)}}--}}
                    @foreach($amdl as $department)
                    <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-blue">
                        <div class="inner">

                            <h3>{{$department->organization->seeker->count() ?? ''}} </h3>

                            <p>{{$department->organization->name ?? '' }} </p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-people-roof"></i>
                        </div>
{{--                        {{route('directorstaffamdl',$department->id)}}--}}

                        <a href="{{route('directorsDepartmentAmdl',encrypt($department->organization->id))}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                    @endforeach

                    @foreach($msnc as $msncstaff)
                        <div class="col-lg-3 col-6">
                            <!-- small box -->
                            <div class="small-box bg-blue">
                                <div class="inner">

                                    <h3>{{$msncstaff->department->tblUser->count() ?? ''}} </h3>

                                    <p>{{$msncstaff->department->deptName ?? '' }} </p>

                                </div>
                                <div class="icon">
                                    <i class="fa fa-people-roof"></i>
                                </div>
                                <a href="{{route('directorsDepartmentMsnc',encrypt($msncstaff->department->deptID))}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                    @endforeach
            @endif


            @can('isDepartment')

                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-blue">
                        <div class="inner">
                            <h3>{{$director_seeker ?? ''}}</h3>

                            <p>{{Auth::user()->organization->name ?? '' }} </p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-people-roof"></i>
                        </div>
                        <a href="/directorstaffamdl" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>

            @endcan

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
