@extends('layouts.admin')



@section('content')

    {{--{{dd($dept)}}--}}
    <h1>{{ $sub->name }}</h1>
    @livewire('yearly-goals',['dept'  => $dept, 'sub'=> $sub])
    <script type="text/javascript">
        window.onscroll = function (ev) {
            if ((window.innerHeight + window.scrollY) >= document.body.offsetHeight) {
                window.livewire.emit('load-more');
            }
        };
    </script>

@endsection

