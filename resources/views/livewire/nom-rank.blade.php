<div>
    {{-- Be like water. --}}



    @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif

    @if($updateMode)
        @include('livewire.updateNom')
    @else
        @include('livewire.createNom')
    @endif
    <br>
    <div class="row">
        <div class="col-sm-10 ">
            <div class="card">
                <div class="card-body table-responsive">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>

                            <th>S/N</th>
                            <th>Nomenclature Category</th>

                            <th >Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($posts as $i=> $post)
                            <tr>

                                <td>{{++$i}}</td>
                                <td>{{ $post->name }}</td>

                                <td>
                                    <button wire:click="edit({{ $post->id }})" class="btn btn-primary btn-sm">Edit Rank</button>
                                                        <button wire:click="delete({{ $post->id }})" class="btn btn-danger btn-sm">Delete</button>
{{--                                    <a href="{{route('rankAmdlStaff',encrypt($post->id))}}"> <button class="btn btn-info btn-sm"><i class="fa fa-eye"></i> View Staff </button></a>--}}
                                    <a href="{{route('nomGroup',encrypt($post->id))}}"> <button class="btn btn-info btn-sm"><i class="fa fa-eye"></i> Add Group </button></a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
