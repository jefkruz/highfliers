@extends('layouts.admin')


@section('content')



<h1>{{$dept->deptName}}</h1>
    @livewire('deptstaff',['department'  => $dept])
    <script type="text/javascript">
        window.onscroll = function (ev) {
            if ((window.innerHeight + window.scrollY) >= document.body.offsetHeight) {
                window.livewire.emit('load-more');
            }
        };
    </script>
@endsection
