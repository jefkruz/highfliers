<div>

        @if($updateMode)
            @include('livewire.updateYgoals')
        @else
            @include('livewire.createYgoals')
        @endif
        <br>
        <div class="row">
            <div class="col-sm-10 ">
                @if (session()->has('message'))
                    <div class="alert alert-success">
                        {{ session('message') }}
                    </div>
                @endif
                <div class="card">

                    <div class="card-body table-responsive">
                                <table id="example1" class="table table-bordered table-striped">
                                <tr>

                                    <th>S/N</th>
                                    <th>Goal Name</th>
                                    <th>Year</th>

                                    <th>Action</th>
                                </tr>

                                @foreach($goals as $key => $goal)

                                    <tr>

                                        <td>{{ ++$key }}</td>
                                        <td>{{ $goal->name }}</td>
                                        <td>{{ $goal->year }}</td>
                                        <td>
                                            <a href="{{route('monthlyGoals.index',['id1' => encrypt($goal->id), 'id2' => encrypt($goal->sub_department_id)])}}"> <button class="btn btn-info btn-sm"><i class="fa fa-list"></i> Assign Monthly </button></a>

                                            <button wire:click="edit({{ $goal->id }})" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i> Edit</button>
                                            <button wire:click="delete({{ $goal->id }})" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Delete</button>
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
