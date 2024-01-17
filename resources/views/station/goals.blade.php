@extends('layouts.admin')


@section('content')



{{--{{dd($dept)}}--}}
{{--<h1>{{ $org->year.' '.  date('F', mktime(0, 0, 0, $org->month, 1))}}</h1>--}}
    @livewire('goal',['org'  => $org])
    <script type="text/javascript">
        window.onscroll = function (ev) {
            if ((window.innerHeight + window.scrollY) >= document.body.offsetHeight) {
                window.livewire.emit('load-more');
            }
        };
    </script>
@endsection
