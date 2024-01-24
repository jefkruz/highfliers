@extends('layouts.app')

@section('template_title')
    {{ $unit->name ?? "{{ __('Show') Unit" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Unit</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('units.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Department Id:</strong>
                            {{ $unit->department_id }}
                        </div>
                        <div class="form-group">
                            <strong>Sub Department Id:</strong>
                            {{ $unit->sub_department_id }}
                        </div>
                        <div class="form-group">
                            <strong>Name:</strong>
                            {{ $unit->name }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
