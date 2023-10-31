@extends('layouts.admin')


@section('content')



{{--{{dd($dept)}}--}}
<h1>{{ $seeker->name }}</h1>
    @livewire('director-goal',['seeker'  => $seeker])
    <script type="text/javascript">
        window.onscroll = function (ev) {
            if ((window.innerHeight + window.scrollY) >= document.body.offsetHeight) {
                window.livewire.emit('load-more');
            }
        };
    </script>
@endsection
