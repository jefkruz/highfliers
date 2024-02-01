@extends('layouts.admin')


@section('content')



    <h2>{{$dept->deptName}}
    </h2>
    @livewire('tbl-probation-staff',['dept'  => $dept])
    <script type="text/javascript">
        window.onscroll = function (ev) {
            if ((window.innerHeight + window.scrollY) >= document.body.offsetHeight) {
                window.livewire.emit('load-more');
            }
        };
    </script>
@endsection

@section('style')
    <link rel="stylesheet" href="{{asset('admin_assets/plugins/select2/css/select2.min.css')}}">
    <link rel="stylesheet" href="{{asset('admin_assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
@endsection

@section('script')

    <script src="{{asset('admin_assets/plugins/select2/js/select2.full.min.js')}}"></script>
    <script>


        $('.select2bs4').select2({
            theme: 'bootstrap4'
        })
    </script>
@endsection
