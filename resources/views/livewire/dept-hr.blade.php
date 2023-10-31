<div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">


                    @if (session()->has('message'))
                        <div class="alert alert-success">
                            {{ session('message') }}
                        </div>
                    @endif


                    <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100">
                        <thead>
                        <tr>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Rank</th>
                            <th>Email</th>
                            <th>Department</th>
                            <th>Action</th>

                        </tr>
                        </thead>


                        <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td>{{$user->seeker->first_name}}</td>
                                <td>{{$user->seeker->last_name}}</td>
                                <td>{{$user->seeker->rank->rank?? 'null'}}</td>
                                <td>{{$user->seeker->email}}</td>

                                <td>{{$user->organization->name?? 'null'}}</td>
                                <td>
                                    <button  wire:click="delete({{ $user->id }})"   class="btn btn-danger btn-sm">Delete</button>
{{--                                    <a href="/staffgradeamdl/{{$user->id}}"> <button    class="btn btn-info btn-sm">Grade</button></a>--}}
{{--                                    <a href="/staffreviewamdl/{{$user->id}}"> <button    class="btn btn-secondary btn-sm">Reviews</button></a>--}}
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


</div><!-- /.modal -->
</div> <!-- end preview-->
</div>
