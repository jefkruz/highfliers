@extends('layouts.admin')



@section('content')


    <h2>{{$staff->staff->first_name .' '. $staff->staff->first_name }}</h2>
{{--    <button class="btn btn-primary"><b>YEARLY GOAL:  </b> {{ $yearly->name}}</button>--}}
    @livewire('monthly-goals',['dept'  => $dept, 'staff' => $staff])
    <script type="text/javascript">
        window.onscroll = function (ev) {
            if ((window.innerHeight + window.scrollY) >= document.body.offsetHeight) {
                window.livewire.emit('load-more');
            }
        };
    </script>

@endsection

