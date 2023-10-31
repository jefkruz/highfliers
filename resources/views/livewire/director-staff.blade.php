<div>
    <div class="row">
        <a href="/depthr" class="btn btn-info btn-sm m-2">   See HR</a>
        <a href="/deptSupervisor" class="btn btn-warning btn-sm m-2">See Supervisor</a>



        <div class="col-12">
            <div class="card">

                <div class="card-body">

                    <form class="app-search  d-lg">
                        <div class="position-relative">
                            <input type="text" wire:model="search" class="form-control" placeholder="Search...">
                            <span class="bx bx-search-alt"></span>
                        </div>
                    </form>
                    @if (session()->has('message'))
                        <div class="alert alert-success">
                            {{ session('message') }}
                        </div>
                    @endif

                    @if($updateMode)
                        @include('livewire.updatestaffdept')

                    @endif
                    <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100">
                        <thead>
                        <tr>
                            <th>First Name</th>
                            <th>Other Name</th>
                            <th>Last Name</th>
                            <th>Rank</th>
                            <th>Email</th>
                            <th>BLW Portal ID</th>
                            <th>Department</th>
                            <th>Action</th>

                        </tr>
                        </thead>


                        <tbody>
                        @foreach ($users as $user)
                            @if($user->organization_id == $department->id)
                            <tr>
                                <td>{{$user->first_name}}</td>
                                <td>{{$user->other_name}}</td>
                                <td>{{$user->last_name}}</td>
                                <td>{{$user->rank->rank?? 'null'}}</td>
                                <td>{{$user->email}}</td>
                                <td>{{$user->blw_portal_id}}</td>

                                <td>{{$user->organization->name?? 'null'}}</td>
                                <td>
{{--                                    <button  wire:click="edit({{ $user->id }})"   class="btn btn-primary btn-sm">Edit</button>--}}
                                    <a href="{{route('amdlProfile',$user->id)}}"> <button   class="btn btn-danger btn-sm"><i class="fa fa-user"></i>  Profile</button></a>

                                @can('isDepartment')
                                    <button  wire:click="hr({{ $user->id }})"   class="btn btn-dark btn-sm">Make HR</button>
                                    <button  wire:click="supervisor({{ $user->id }})"   class="btn btn-warning btn-sm">Make Supervisor</button>
                                    @endcan
                                    <a href="/staffgradeamdl/{{$user->id}}"> <button    class="btn btn-info btn-sm">Grade</button></a>
                                    <a href="/staffreviewamdl/{{$user->id}}"> <button    class="btn btn-secondary btn-sm">Reviews</button></a>
{{--                                    <a href="/directorgoals/{{$user->id}}"> <button    class="btn btn-danger btn-sm">Appraisals</button></a>--}}
                                    {{--                                <button wire:click="delete({{ $user->id }})" class="btn btn-danger btn-sm">Delete</button>--}}
                                </td>
                            </tr>
@endif
                        @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->

    <div id="myModal" class="modal fade" tabindex="-1" wire:model="showLikeModal" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title mb-4">Info</h4>

                            <form>
                                <div class="row mb-4">
                                    <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">First Name</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" wire:model="firstName">
                                        @error('firstName') <span class="text-danger">{{ $message }}</span>@enderror
                                    </div>
                                </div>

                                <div class="row mb-4">
                                    <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Other Name</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="horizontal-firstname-input">
                                    </div>
                                </div>


                                <div class="row mb-4">
                                    <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Last Name</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="horizontal-firstname-input">
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <label for="horizontal-email-input" class="col-sm-3 col-form-label">Email</label>
                                    <div class="col-sm-9">
                                        <input type="email" class="form-control" id="horizontal-email-input">
                                    </div>
                                </div>


                                <div class="row justify-content-end">
                                    <div class="col-sm-9">



                                        <div>
                                            <button type="submit" class="btn btn-primary w-md">Submit</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!-- end card body -->
                    </div>
                    <!-- end card -->
                </div>
                <!-- end col -->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary waves-effect" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary waves-effect waves-light">Save changes</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
</div> <!-- end preview-->
</div>