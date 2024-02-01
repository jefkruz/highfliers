<div>
    {{-- Knowing others is intelligence; knowing yourself is true wisdom. --}}
    @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif
    @if($createMode)
        @include('livewire.createAmdlProbation')


    @endif
    @if($subDeptMode)
        @include('livewire.updatestaffSubdept')
    @endif


    <br>
    <div class="row">
        <div class="col-sm-10 ">

            <div class="card">
                <div class="card-header">
                    <div style="display: flex; justify-content: space-between; align-items: center;">



                        <div class="float-left">
                            <button wire:click="create({{ $department_id }})" class="btn btn-success btn-sm float-left"  data-placement="left">
                                {{ __('Add New') }}
                            </button>
                        </div>
                    </div>
                </div>
                <div class="card-body table-responsive">
                    <table id="example1" class="table table-bordered table-striped">
                        <tr>

                            <th>S/N</th>
                            <th>Portal ID</th>
                            <th>Full Name</th>
                            <th>Email</th>

                            <th>Action</th>
                        </tr>

                        @foreach($staffs as $key => $staff)

                            <tr>

                                <td>{{ ++$key }}</td>
                                <td>{{ $staff->portal_id }}</td>
                                <td>{{ $staff->first_name .' '.$staff->last_name }}</td>
                                <td>{{ $staff->email }}</td>
                                <td>
                                    <button  wire:click="subDept({{ $staff->user_id }})"   class="btn btn-primary btn-sm m-1"> <i class="fa fa-edit"></i> Assign Unit</button>
{{--                                    <a href="{{route('staffgoals', encrypt($staff->user_id))}}" class="btn btn-sm btn-warning"><i class="fa fa-eye"></i> View Goals</a>--}}
                                    <a class="btn btn-sm btn-info" href="{{route('monthlyGoals.index',['id1' => encrypt($staff->department_id), 'id2' => encrypt($staff->user_id)])}}"><i class="fa fa-fw fa-edit"></i> Goals</a>


                                    {{--                                    <a href="{{route('monthlyGoals.index',['id1' => encrypt($goal->id), 'id2' => encrypt($goal->sub_department_id)])}}"> <button class="btn btn-info btn-sm"><i class="fa fa-list"></i> Assign Monthly </button></a>--}}

{{--                                    <button wire:click="edit({{ $goal->id }})" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i> Edit</button>--}}
{{--                                    <button wire:click="delete({{ $goal->id }})" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Delete</button>--}}
                                    {{--                                            <a href="{{route('rankAmdlStaff',encrypt($post->id))}}"> <button class="btn btn-info btn-sm"><i class="fa fa-eye"></i> View Staff </button></a>--}}
                                </td>

                                {{--                                        <td> <button  wire:click="edit({{ $value->id}})"   class="btn btn-primary btn-sm">Add Score</button></td>--}}
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
