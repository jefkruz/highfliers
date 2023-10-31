@extends('layouts.admin')

@section('title') @lang('cabinets') @endsection

@section('content')

    @component('components.breadcrumb')
        @slot('li_1') Apps @endslot
        @slot('title') Appraisals @endslot
    @endcomponent

{{--{{dd($dept)}}--}}
<h1>{{$dept->year.' '.  date('F', mktime(0, 0, 0, $dept->month, 1))}}</h1>
    @livewire('see-appraisals-user',['department'  => $dept])
    <script type="text/javascript">
        window.onscroll = function (ev) {
            if ((window.innerHeight + window.scrollY) >= document.body.offsetHeight) {
                window.livewire.emit('load-more');
            }
        };
    </script>
@endsection
