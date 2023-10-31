@extends('layouts.admin')



@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-lg-6">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Create Administrator</span>
                    </div>

                    <div class="card-body">
{{--                        <form method="POST" action="{{ route('admins.store') }}"  role="form" enctype="multipart/form-data">--}}
{{--                            @csrf--}}
{{--                            @include('admins.form')--}}
{{--                        </form>--}}
                        <livewire:admins />
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
