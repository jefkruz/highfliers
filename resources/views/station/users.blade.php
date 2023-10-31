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

        <a class="nav-link" href="{{url('/tblexportManifestsusers/xls/'.$slug)}}">
            <button type="button" class="mb-1 mt-1 me-1 btn btn-dark"> Download Bank schedule</button>
        </a>
        <table class="table">
            <thead>
            <tr>
                <th style="text-transform:uppercase;">Name</th>

                <th style="text-transform:uppercase;">SSNO</th>
                <th  style="text-transform:uppercase;">pension pin</th>
                <th  style="text-transform:uppercase;">employee type</th>
                <th  style="text-transform:uppercase;">gross</th>
                <th  style="text-transform:uppercase;">paye</th>
                <th  style="text-transform:uppercase;">employee contribution</th>
                <th  style="text-transform:uppercase;">employer contribution</th>
                <th  style="text-transform:uppercase;">pension on reimbursable</th>
                <th  style="text-transform:uppercase;">amount</th>
                <th  style="text-transform:uppercase;">month</th>


            </tr>
            </thead>
            <tbody>
{{--            {{dd($users)}}--}}
            @foreach($users as $us)
@php
   $user= $us->user;
$firstName = $user['firstName']??'';
$title = $user['title']??'';
$lastName = $user['lastName']??'';

@endphp
{{--{{dd($user['firstName'])}}--}}
            <tr>
{{--                {{dd($us->user($us->userID))}}--}}


                <td>{{$title ."  " . $firstName. ' '.$lastName}} </td>

                <td>{{$us->ssno}} </td>
                <td>{{$us->pension_pin}} </td>
                <td>{{$us->employee_type}} </td>
                <td>{{$us->gross}} </td>
                <td>{{$us->paye}} </td>
                <td>{{$us->employee_contribution}} </td>
                <td>{{$us->employer_contribution}} </td>
                <td>{{$us->pension_on_reimbursable}} </td>
                <td>{{$us->amount}} </td>
                <td>{{$us->month}} </td>

            </tr>
            @endforeach
            </tbody>
        </table>
<ul>
    <li>{{ $users->links() }}</li>
</ul>
@endsection
