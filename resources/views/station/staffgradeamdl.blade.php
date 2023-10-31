@extends('layouts.admin')


@section('content')



<h1>{{$dept->title.' '. $dept->first_name.' '.$dept->other_name.' '.$dept->last_name }}</h1>
    @livewire('amdl-grade',['department'  => $dept])
    <script type="text/javascript">
        window.onscroll = function (ev) {
            if ((window.innerHeight + window.scrollY) >= document.body.offsetHeight) {
                window.livewire.emit('load-more');
            }
        };
    </script>
@endsection
