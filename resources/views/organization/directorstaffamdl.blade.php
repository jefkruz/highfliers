@extends('layouts.admin')


@section('content')




<h2>{{$dept->name}}</h2>
    @livewire('director-staff',['department'  => $dept])
    <script type="text/javascript">
        window.onscroll = function (ev) {
            if ((window.innerHeight + window.scrollY) >= document.body.offsetHeight) {
                window.livewire.emit('load-more');
            }
        };
    </script>
@endsection
