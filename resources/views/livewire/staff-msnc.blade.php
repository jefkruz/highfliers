<div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body table-responsive" >

                    <form >
                        <div class="input-group">
                            <input type="text" wire:model="search" class="form-control form-control-lg" placeholder="Search...">

                        </div>
                    </form>
                    @if (session()->has('message'))
                        <div class="alert alert-success">
                            {{ session('message') }}
                        </div>
                    @endif

                    @if($updateMode)
                        @include('livewire.updatestaffmsnc')
                    @else
                        @include('livewire.createstaffmsnc')
                    @endif
                    <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100">
                        <thead>
                        <tr>
                            <th>First Name</th>
                            <th>Last Name</th>
{{--                            <th>Rank</th>--}}
                            <th>Email</th>
                            <th>Department</th>
                            <th>Action</th>

                        </tr>
                        </thead>


                        <tbody>
                        @foreach ($users as $user)
                        <tr>
                            <td>{{$user->firstName}}</td>
                            <td>{{$user->lastName}}</td>
{{--                            <td>{{dd($user->tblRank)}}</td>--}}
                            <td>{{$user->emailAddress}}</td>

                            <td>{{$user->tblDept->deptName?? 'null'}}</td>
                            <td>
                                <a href="{{route('amdlProfile',$user->id)}}"> <button   class="btn btn-danger btn-sm"><i class="fa fa-user"></i>  Profile</button></a>

                                <button  wire:click="edit({{ $user->id }})"   class="btn btn-primary btn-sm">Edit</button>
                                <a href="/staffgrade/{{$user->id}}"> <button    class="btn btn-info btn-sm">Grade</button></a>
                                <a href="/staffreview/{{$user->userID}}"> <button    class="btn btn-secondary btn-sm">Reviews</button></a>
{{--                                <button wire:click="delete({{ $user->id }})" class="btn btn-danger btn-sm">Delete</button>--}}
                            </td>
                        </tr>

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