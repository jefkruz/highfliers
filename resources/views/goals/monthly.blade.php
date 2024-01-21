@extends('layouts.admin')



@section('content')


    <h2>{{ $sub->name }}</h2>
    <button class="btn btn-primary"><b>YEARLY GOAL:  </b> {{ $yearly->name}}</button>
    @livewire('monthly-goals',['yearly'  => $yearly,'sub'  => $sub, 'staffs' => $staffs])
    <script type="text/javascript">
        window.onscroll = function (ev) {
            if ((window.innerHeight + window.scrollY) >= document.body.offsetHeight) {
                window.livewire.emit('load-more');
            }
        };
    </script>

@endsection

