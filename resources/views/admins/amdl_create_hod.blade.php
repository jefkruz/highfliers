@extends('layouts.admin')



@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-lg-6">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Assign {{$user->subdepartment->name}} HOD</span>
                    </div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('storeAmdlHod') }}"  role="form" enctype="multipart/form-data">
                            @csrf


                            <div class="">
                                <div class="row">
                                  <input type="hidden" name="sub_dept_staff_id" value="{{$user->id}}">
                                  <input type="hidden" name="department_id" value="{{$user->department->id}}">
                                  <input type="hidden" name="sub_department_id" value="{{$user->subdepartment->id}}">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="">Full Name</label>
                                            <input type="text" class="form-control" value="{{$user->staff->first_name .' '.$user->staff->last_name}}" readonly name="name">
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="">Department</label>
                                            <input type="text" class="form-control" value="{{$user->department->name}}" disabled name="department">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="">Sub Department</label>
                                            <input type="text" class="form-control" value="{{$user->subdepartment->name}}" disabled name="sub_department">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="">KingsChat Phone Number  <span class="text-red">(234XXXXXXXXXX)</span></label>
                                            <input type="text" class="form-control" value="{{old('phone')}}" placeholder="234XXXXXXXXXX" required name="phone">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="">KingsChat Username  </label>
                                            <input type="text" class="form-control" value="{{old('username')}}" required placeholder="KingsChat Username" name="username">
                                        </div>
                                    </div>




                                </div>
                                <div class="box-footer mt-2">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
