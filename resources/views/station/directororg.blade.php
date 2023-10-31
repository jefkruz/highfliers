@extends('layouts.admin')


@section('content')



{{--{{dd($dept)}}--}}
{{--<h1>{{ Auth::user()->name }}</h1>--}}
    @livewire('dept-appraisal')
    <script type="text/javascript">
        window.onscroll = function (ev) {
            if ((window.innerHeight + window.scrollY) >= document.body.offsetHeight) {
                window.livewire.emit('load-more');
            }
        };
    </script>
@endsection
