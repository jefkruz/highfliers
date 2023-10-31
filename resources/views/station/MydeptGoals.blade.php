@extends('layouts.admin')


@section('content')





    @livewire('mydept-goals')
{{--    @livewire('director-staff')--}}
    <script type="text/javascript">
        window.onscroll = function (ev) {
            if ((window.innerHeight + window.scrollY) >= document.body.offsetHeight) {
                window.livewire.emit('load-more');
            }
        };
    </script>
@endsection
