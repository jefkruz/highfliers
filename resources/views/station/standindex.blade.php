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
               $month= explode('-', $orga->month);
                @endphp
            <tr>

                <td><a class="badge bg-success font-size-11 m-1" href="/tblstandUser/{{$orga->slug}}"> {{$month[0].' '. $monthName = date("F", mktime(0, 0, 0, $month[1], 10)); }} </a> </td>

            </tr>
            @endforeach
            </tbody>
        </table>
{{ $orgas->links() }}
@endsection
