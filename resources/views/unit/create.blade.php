@extends('layouts.admin')



@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-8">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{ __('Create') }} Unit</span>
                    </div>
                    <div class="card-body">
                        <form method="POST"   role="form" enctype="multipart/form-data">
                            @csrf

                            @include('unit.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
