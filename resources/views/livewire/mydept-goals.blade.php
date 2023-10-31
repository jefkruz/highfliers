<div>
    @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif

    <table class="table table-bordered">
        <tr>

            <th>YEAR</th>
            <th>MONTH</th>


        </tr>
        @foreach($contacts as $key => $value)
            <tr>

                <td><a href="/goals/{{encrypt($value->id)}}"  class="btn btn-primary btn-sm"> {{ $value->year }} </a></td>
                <td> <a href="/goals/{{encrypt($value->id)}}"  class="btn btn-primary btn-sm"> {{ date('F', mktime(0, 0, 0, $value->month, 1))}}</a></td>


            </tr>
        @endforeach
    </table>

</div>