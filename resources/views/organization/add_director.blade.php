@extends('layouts.admin')


@section('content')





    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
{{--                    <h4 class="card-title">{{$organization->name}}</h4>--}}

                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <form class="custom-validation" action="/organizationsUsers" method="post" enctype="">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Required</label>
                            <input type="text" name="name" class="form-control" required placeholder="Name" />
                        </div>



                        <div class="mb-3">
                            <label class="form-label">E-Mail</label>
                            <div>
                                <input type="email" name="email" class="form-control" required parsley-type="email"
                                    placeholder="Enter a valid e-mail" />
                            </div>
                        </div>
                        <div class="mb-">
                            <label class="col-form-label">Role</label>
                            <div>
                            <select class="form-control" required id="role" name="role_id">
                                <option value="">-- Select --</option>
                                @foreach ($roles as $key=>$role )
                                    <option value="{{ $role->id }}">{{ $role->name }}</option>
                                @endforeach
                            </select>
                            </div>
                        </div>


                        <div class="mb-">
                            <label class="col-form-label">Organizations</label>
                            <div>
                                <select class="form-control" required id="role" name="organization_id">
                                    <option value="">-- Select --</option>
                                    @foreach ($organizations as $key=>$role )
                                        <option value="{{ $role->id }}">{{ $role->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

{{--                        <div class="mb-3">--}}

{{--                            <input type="hidden"  class="form-control" name="organization_id" value="{{$organization->id}}"  />--}}
{{--                        </div>--}}
                        <div class="mb-3">
                            <label class="form-label">Password</label>
                            <div>
                                <input type="password" id="pass2" class="form-control" name="password" required placeholder="Password" />
                            </div>
                            <div class="mt-2">
                                <input type="password" class="form-control" required data-parsley-equalto="#pass2"
                                       placeholder="Re-Type Password" />
                            </div>
                        </div>

                        <div class="d-flex flex-wrap gap-2">
                            <button type="submit" class="btn btn-primary waves-effect waves-light">
                                Submit
                            </button>
                            <button type="reset" class="btn btn-secondary waves-effect">
                                Cancel
                            </button>
                        </div>
                    </form>

                </div>
            </div>
        </div> <!-- end col -->


    </div> <!-- end row -->

@endsection
@section('script')
    <script src="{{ URL::asset('/assets/libs/parsleyjs/parsleyjs.min.js') }}"></script>

    <script src="{{ URL::asset('/assets/js/pages/form-validation.init.js') }}"></script>
@endsection
