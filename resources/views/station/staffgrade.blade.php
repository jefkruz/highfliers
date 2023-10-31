@extends('layouts.admin')


@section('content')



<h1>{{$dept->title.' '. $dept->firstName.' '.$dept->otherName.' '.$dept->lastName }}</h1>
    @livewire('staffgrade',['department'  => $dept])
    <script type="text/javascript">
        window.onscroll = function (ev) {
            if ((window.innerHeight + window.scrollY) >= document.body.offsetHeight) {
                window.livewire.emit('load-more');
            }
        };
    </script>
@endsection
