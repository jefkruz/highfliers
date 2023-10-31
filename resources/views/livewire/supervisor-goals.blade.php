<div>
    @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif


    <table class="table table-bordered">
        <tr>

            <th>Year</th>
            <th>Month</th>

        </tr>
{{--        {{dd($seeker)}}--}}
        @foreach($users as $key => $value)
            <tr>

                <td><a href="/staffgoals/{{encrypt($seeker->id)}}/{{encrypt($value->GGoals->id)}}" class="btn btn-primary btn-sm">{{ $value->GGoals->year }}</a></td>
                <td> <a href="/staffgoals/{{encrypt($seeker->id)}}/{{encrypt($value->GGoals->id)}}" class="btn btn-primary btn-sm"> {{ date(' F', mktime(0, 0, 0, $value->GGoals->month, 1))}}</a></td>

{{--                <td> <button  wire:click="edit({{ $value->id}})"   class="btn btn-primary btn-sm">Add Score</button></td>--}}
            </tr>
        @endforeach
    </table>


</div>
