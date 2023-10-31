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

                <th scope="col">Manifest</th>

            </tr>
            </thead>
            <tbody>
            @foreach($orgas as $orga)
                @php
               $month= explode('-', $orga->send_date);
                @endphp
            <tr>

                <td><a class="btn btn-outline-secondary waves-effect" href="/DownloadBankManifest/{{$orga->id}}"> {{$orga->send_date}} </a> </td>

            </tr>
            @endforeach
            </tbody>
        </table>
{{ $orgas->links() }}
@endsection
