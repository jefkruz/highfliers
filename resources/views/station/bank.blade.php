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
    <h2 class="text-title">Import Bank - {{$orga->deptName}}</h2>


    <form style="border: 4px solid #a1a1a1;margin-top: 15px;padding: 10px;" action="{{ route('tblimportManifestsbank') }}" class="form-horizontal" method="post" enctype="multipart/form-data">

        <div class="form-row">
            <div class="form-group col-md-4">
                <label for="inputEmail4">Date</label>
                <input type="date" class="form-control" id="inputEmail4" name="send_date" placeholder="Date">
            </div>
            <div class="form-group col-md-4">
                <label for="inputPassword4">Name of Bank </label>
                <input type="text" name="bank_name" class="form-control" id="inputPassword4" placeholder="Name of Bank">
            </div>

            <div class="form-group col-md-4">
                <label for="inputZip">Location of Bank </label>
                <input type="text" class="form-control" name="location_bank" id="inputZip" placeholder="Location of Bank">
            </div>
        </div>

        <div class="form-row">

            <div class="form-group col-md-4">
                <label for="inputPassword4">Account Name</label>
                <input type="text" name="account_name" class="form-control" id="inputPassword4" placeholder="Name of Bank">
            </div>

            <div class="form-group col-md-4">
                <label for="inputZip"> Account Number </label>
                <input type="text" class="form-control" id="inputZip" name="account_number" placeholder="Account Number">
            </div>
        </div>
        <div class="form-row">
        <div class="form-group col-md-6">
            <label for="inputAddress2">Accounts </label>
            <input type="file" name="import_file" class="form-control" id="inputAddress2" placeholder="Apartment, studio, or floor">
        </div>
        </div>



        {{ csrf_field() }} <p></p>
        <input type="hidden" name="orga" value="{{$orga->deptID}}">
        <div class="form-group">
            <div class="form-check">

                <label class="form-check-label" for="gridCheck">

                </label>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Sign in</button>

    </form>
</div>

@endsection
