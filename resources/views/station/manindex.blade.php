@extends('layouts.admin')

@section('content')
<div class="container" style="margin-top: 5rem;">
    @if($message = Session::get('success'))
        <div class="alert alert-info alert-dismissible fade in" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
            <strong>Success!</strong> {{ $message }}
        </div>
    @endif
    {!! Session::forget('success') !!}
    <br />
        <table class="table">
            <thead>
            <tr>

                <th scope="col"> Bank schedule </th>

            </tr>
            </thead>
            <tbody>
            @foreach($orgas as $orga)
                @php
                //echo $orga->month;
                $month= explode('-', $orga->month);
                @endphp
{{--                {{dd($month)}}--}}
            <tr>

                <td><a href="/tblmanifestuser/{{$orga->slug}}" class="badge bg-success font-size-11 m-1"> {{ $orga->month }} </a> </td>

            </tr>
            @endforeach
            </tbody>
        </table>

@endsection
