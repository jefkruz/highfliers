@extends('layouts.admin')



@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-lg-6">



                <div class="card card-default">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">



{{--                            <div class="float-right">--}}
{{--                                <a href="{{ route('admins.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">--}}
{{--                                    {{ __('Back') }}--}}
{{--                                </a>--}}
{{--                            </div>--}}
                        </div>
                    </div>

                    <div class="card-body">
                        <form method="POST"   enctype="multipart/form-data">
                            @csrf
                         <input type="hidden" name="seeker_id" value="{{$staff->id}}">
                         <input type="hidden" name="organization_id" value="{{$staff->organization_id}}">

                            <div class="">
                                <div class="row">

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="">Full Name</label>
                                            <input type="text" class="form-control" value="{{$staff->title.' '. $staff->first_name.' '.$staff->other_name.' '.$staff->last_name}}" disabled >
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="">Department</label>
                                            <input type="text" class="form-control" value="{{$staff->organization->name}}" placeholder=""  disabled>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="">Year</label>
                                            <select name="year"  class="form-control" required>
                                                <option value="">Select Year</option>
                                                @for ($year = date("Y"); $year >= 2015; $year--)
                                                    <option value="{{ $year }}">{{ $year }}</option>
                                                @endfor
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="">Grade</label>
                                            <select name="grade_score"  class="form-control" required>
                                                <option value="">Select Grade</option>

                                                    <option value="A">A</option>
                                                    <option value="B">B</option>
                                                    <option value="C">C</option>
                                                    <option value="D">D</option>
                                                    <option value="E">E</option>
                                                    <option value="F">F</option>

                                            </select>
                                        </div>
                                    </div>


                                </div>
                                <div class="box-footer mt-2">
                                    <button type="submit" class="btn btn-primary">Grade</button>
                                </div>
                            </div>

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
