<div>
    {{-- Be like water. --}}



    @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif

    @if($updateMode)
        @include('livewire.update')
    @else
        @include('livewire.create')
    @endif

    <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100">
        <thead>
        <tr>

            <th>Rank</th>

            <th width="150px">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($posts as $post)
            <tr>

                <td>{{ $post->rank }}</td>

                <td>
                    <button wire:click="edit({{ $post->id }})" class="btn btn-primary btn-sm">Edit</button>
                    {{--                    <button wire:click="delete({{ $post->id }})" class="btn btn-danger btn-sm">Delete</button>--}}
                    <a href="/rankstaffamdl/{{ $post->id }}"> <button class="btn btn-info btn-sm">See </button></a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
