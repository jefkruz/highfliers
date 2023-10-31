@extends('layouts.admin')


@section('content')




<h1>{{$dept->rank}}</h1>
    @livewire('staff-rank-amdl',['department'  => $dept])
    <script type="text/javascript">
        window.onscroll = function (ev) {
            if ((window.innerHeight + window.scrollY) >= document.body.offsetHeight) {
                window.livewire.emit('load-more');
            }
        };
    </script>
@endsection
