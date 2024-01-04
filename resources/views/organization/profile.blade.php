@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-md-3">
            <div class="card">
                <div class="card-body box-profile">
                    <div class="text-center">

                        <img class="profile-user-img img-fluid img-circle" src="{{asset('images/default.png')}}" alt="User profile picture">


                    </div>

                    <h3 class="profile-username text-center">{{$member->title}} {{$member->first_name}} {{$member->last_name}} {{$member->other_name}}</h3>

                    <p class="text-muted text-center mb-0 bg-info"></p>

                    <p class="text-muted text-center text-bold mb-0 bg-primary">PORTAL ID: {{$member->blw_portal_id}}</p>


                        <p class="text-muted text-bold text-center mb-0 bg-maroon mt-1"> REG CODE: {{$member->reg_code_id}}</p>


                    <ul class="list-group list-group-unbordered mb-3">
                        <li class="list-group-item">
                            <span>Email</span> <b class="float-right">{{$member->email}}</b>
                        </li>
                        <li class="list-group-item">
                            <span>Alt Email</span> <b class="float-right">{{$member->alt_email}}</b>
                        </li>
                        <li class="list-group-item">
                            <span>Current Department</span> <b class="float-right">{{$member->organization->name ?? ''}}</b>
                        </li>
                        <li class="list-group-item">
                            <span>Phone number</span> <b class="float-right">{{$member->phone}}</b>
                        </li>
                        <li class="list-group-item">
                            <span>Kingschat Number</span> <b class="float-right">{{$member->kcphone}}</b>
                        </li>
                        <li class="list-group-item">
                            <span>Gender</span> <b class="float-right">{{ucwords($member->gender)}}</b>
                        </li>
                        <li class="list-group-item">
                            <span>Posting Type</span> <b class="float-right">{{ucwords($member->postingType)}}</b>
                        </li>
                        <li class="list-group-item">
                            <span>Nomenclature Category</span> <b class="float-right">{{ucwords($member->nomenclature()->name?? 'null')}}</b>
                        </li>
                        <li class="list-group-item">
                            <span>Nomenclature Group</span> <b class="float-right">{{ucwords($member->nomenclatureGroup()->name?? 'null')}}</b>
                        </li>
                        <li class="list-group-item">
                            <span>Nomenclature Rank</span> <b class="float-right">{{ucwords($member->nomenclatureRank()->name?? 'null')}}</b>
                        </li>

                    </ul>


                    <button  class="btn bg-navy btn-block"><b>JOB: {{ucwords($member->jobTitle)}}</b> </button>
                    <button class="btn bg-maroon btn-block"><b>RANK: {{ucwords($member->rank()->rank ?? '')}}</b> </button>

                </div>
                <!-- /.card-body -->
            </div>
            <!-- About Me Box -->
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">About Me</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <strong><i class="fas fa-graduation-cap mr-1"></i> Education</strong>


                    <ul class="list-group list-group-unbordered mb-3">
                        <li class="list-group-item">
                            <span>Course Studied:</span> <b class="float-right">{{$member->education->course?? 'NULL'}}</b>
                        </li>
                        <li class="list-group-item">
                            <span>Institution</span> <b class="float-right">{{$member->education->school?? 'NULL'}}</b>
                        </li>
                        <li class="list-group-item">
                            <span>Year of Graduation</span> <b class="float-right">{{$member->education->year?? 'NULL'}}</b>
                        </li>

                    </ul>

                    <hr>

                    <strong><i class="fas fa-map-marker-alt mr-1"></i> Location</strong>

                    <p class="text-muted">{{$member->address}},{{$member->state}} {{$member->country}}</p>

                    <hr>



                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        <div class="col-md-9">
            <div class="card">
                <div class="card-header p-2">
                    <ul class="nav nav-pills">
                        <li class="nav-item"><a class="nav-link active" href="#goals" data-toggle="tab">Goals</a></li>
                        <li class="nav-item"><a class="nav-link" href="#grades" data-toggle="tab">Grades</a></li>
                        <li class="nav-item"><a class="nav-link" href="#reviews" data-toggle="tab">Reviews</a></li>
{{--                        <li class="nav-item"><a class="nav-link" href="#skills" data-toggle="tab">Skills</a></li>--}}
                    </ul>
                </div><!-- /.card-header -->
                <div class="card-body">
                    <div class="tab-content">
                        <div class="active tab-pane" id="goals">
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>MONTH</th>
                                    <th> GOALS</th>
                                    <th>TIMELINE</th>
                                    <th>ACHIEVEMENT</th>
                                    <th>STAFF SCORE</th>
                                    <th>SUPERVISOR SCORE</th>
                                    <th>HR SCORE</th>
                                    <th>END DATE</th>


                                </tr>
                                </thead>
                                <tbody>
                                @foreach($goals as $i => $goal)
                                    <tr>
                                        <td>{{$i + 1}}</td>
                                        <td></td>
                                        <td>{{$goal->monthly_goals}}</td>
                                        <td>{{$goal->timeline}}</td>
                                        <td>{{$goal->achievement}}</td>
                                        <td>{{$goal->staff_score}}</td>
                                        <td>{{$goal->supervisor_score}}</td>
                                        <td>{{$goal->hr_score}}</td>
                                        <td>{{$goal->end_date}}</td>

                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>


                        <div class="tab-pane" id="grades">
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th>#</th>

                                    <th>DEPARTMENT</th>
                                    <th>GRADE SCORE</th>
                                    <th>YEAR</th>


                                </tr>
                                </thead>
                                <tbody>
                                @foreach($grades as $i => $grade)
                                    <tr>
                                        <td>{{$i + 1}}</td>
                                        <td>{{$grade->organization->name}}</td>
                                        <td>{{$grade->grade_score}}</td>
                                        <td>{{$grade->year}}</td>




                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="tab-pane" id="reviews">
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>RANK</th>
                                    <th>SALARY</th>
                                    <th>DATE OF REVIEW</th>


                                </tr>
                                </thead>
                                <tbody>
                                @foreach($reviews as $i => $review)
                                    <tr>
                                        <td>{{$i + 1}}</td>
                                        <td>{{$review->rank}}</td>
                                        <td>{{$review->salary}}</td>
                                        <td>{{$review->date_of_review}}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
{{--                        <div class="tab-pane" id="skills">--}}
{{--                            <table class="table table-striped">--}}
{{--                                <thead>--}}
{{--                                <tr>--}}
{{--                                    <th>#</th>--}}
{{--                                    <th>ABILITY</th>--}}
{{--                                    <th>COMPETENCY</th>--}}
{{--                                    <th>DESCRIPTION</th>--}}


{{--                                </tr>--}}
{{--                                </thead>--}}
{{--                                <tbody>--}}
{{--                                @foreach($skills as $i => $skill)--}}
{{--                                    <tr>--}}
{{--                                        <td>{{$i + 1}}</td>--}}
{{--                                        <td>{{$skill->ability}}</td>--}}
{{--                                        <td>{{$skill->competency}}</td>--}}
{{--                                        <td>{{$skill->description}}</td>--}}
{{--                                    </tr>--}}
{{--                                @endforeach--}}
{{--                                </tbody>--}}
{{--                            </table>--}}
{{--                        </div>--}}
                        <!-- /.tab-pane -->
                    </div>
                    <!-- /.tab-content -->
                </div><!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div>




    @endsection

@section('style')
@endsection

@section('script')
@endsection
