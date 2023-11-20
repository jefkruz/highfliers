@extends('layouts.admin')



@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-6">


                <div class="card card-default">
                    <div class="card-header">
                        <a href="{{route('subdepartments.msncindex',encrypt($dept->deptID))}}" class="btn btn-danger">Back</a>
                    </div>
                    <div class="card-body">

                        <form method="POST"   role="form" enctype="multipart/form-data">
                            @csrf
                      <input type="hidden" name="department_id" value="{{$dept->deptID}}">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">Department Name</label>
                                    <input type="text" class="form-control"   value="{{$dept->deptName}}" disabled>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for=""> Name of Sub Department</label>
                                    <input type="text" class="form-control"  placeholder=" Name" name="name" value="{{old('name')}}">
                                </div>
                            </div>

                            <div class="box-footer mt20">
                                <button type="submit" class="btn btn-primary">{{ __('Create') }}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
