@extends('layouts.admin')
@section('content')
    <div class="row">

        <div class="col-lg-8">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-4">Import Salary</h4>



                    <!-- end row -->

                    <div class="row">

                        @if($message = Session::get('success'))


                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ $message }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                    @endif
                    {!! Session::forget('success') !!}
                    <!-- end col -->
                    </div>
                    <!-- end row -->


                    <div class="mt-4 pt-2">
                        <h5 class="font-size-14 mb-0"><i class="mdi mdi-arrow-right text-primary"></i> {{$orga->deptName}}</h5>
                    </div>

                    <div class="row">
                        <div class="col-sm-8">
                            <div class="mt-4">

                                <div>

                                    <div class="input-group">
                                        <form action="{{ route('Allowancetbl') }}"  method="post" enctype="multipart/form-data">
                                            {{ csrf_field() }}
                                            <input type="file" name="import_file"  class="form-control form-control-lg" id="formFileLg" >
                                            <p></p>
                                            <button class="btn btn-primary">Import File</button>
                                        </form>
                                    </div>
                                </div>

                            </div>
                        </div>



                    </div>

                </div>
            </div>

        </div>
    </div>


@endsection
