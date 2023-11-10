@extends('layouts.admin')


@section('content')



<h1>{{$dept->name}}</h1>
    @livewire('nom',['group'  => $dept])
    <script type="text/javascript">
        window.onscroll = function (ev) {
            if ((window.innerHeight + window.scrollY) >= document.body.offsetHeight) {
                window.livewire.emit('load-more');
            }
        };
    </script>
@endsection
