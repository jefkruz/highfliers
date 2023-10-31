@extends('layouts.admin')

@section('title') @lang('Update Organization') @endsection

@section('content')

    @component('components.breadcrumb')
        @slot('li_1') Apps @endslot
        @slot('title') Organizations @endslot
    @endcomponent
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Update Organization</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('organizations.update', $organization->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('organization.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
