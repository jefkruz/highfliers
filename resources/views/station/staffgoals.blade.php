@extends('layouts.admin')


@section('content')



{{--{{dd($seeker)}}--}}
<h1>{{ $seeker->title. ' '.$seeker->first_name . ' '.$seeker->other_name. ' '.$seeker->last_name  }}</h1>
    @livewire('staff-goals',['seeker'  => $seeker, 'org'=> $org])
    <script type="text/javascript">
        window.onscroll = function (ev) {
            if ((window.innerHeight + window.scrollY) >= document.body.offsetHeight) {
                window.livewire.emit('load-more');
            }
        };
    </script>
@endsection
