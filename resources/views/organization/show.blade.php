@extends('layouts.admin')


@section('content')


    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">   {{ $organization->name }}</span>
                        </div>

                    </div>

                    <div class="card-body">


                        @livewire('staff-amdl',['department'  => $organization])
                        <script type="text/javascript">
                            window.onscroll = function (ev) {
                                if ((window.innerHeight + window.scrollY) >= document.body.offsetHeight) {
                                    window.livewire.emit('load-more');
                                }
                            };
                        </script>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
