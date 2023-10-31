<div>
    @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif
        @if($updateMode)
            @include('livewire.supvisorscore')

        @endif

    <table class="table table-bordered">
        <tr>

            <th>Monthly Goals</th>
            <th>Start Date</th>
            <th>End Date</th>


            <th>Achievement</th>
            <th>Staff Score</th>
            <th>Supervisor Score</th>
            <th>HR Score</th>
            <th>Action</th>
        </tr>
        @foreach($contacts as $key => $value)
            <tr>

                <td>{{ $value->monthy_goals }}</td>
                <td>{{ $value->timeline }}</td>
                <td>{{ $value->end_date }}</td>


                <td>{{ $value->achievement }}</td>
                <td>{{ $value->staff_score }}</td>
                <td>{{ $value->supervisor_score }}</td>
                <td>{{ $value->hr_score }}</td>
                <td> <button  wire:click="edit({{ $value->id}})"   class="btn btn-primary btn-sm">Add Score</button></td>
            </tr>
        @endforeach
    </table>


</div>