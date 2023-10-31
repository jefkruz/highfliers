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
    <h2 class="text-title">Comment On  {{$seeker->title.' '.$seeker->firstName.' '.$seeker->lastName}}</h2>

        <table class="table table-bordered">
            <tr>
                <th>No</th>

                <th>Details</th>
                <th width="280px">Action</th>
            </tr>
            @php

            $i=0;
            @endphp
            @foreach ($comments as $comment)
                <tr>
                    <td>{{ ++$i }}</td>

                    <td>{{ $comment->comments }}</td>
                    <td>
                        <form action="{{ route('TblManifestsComment.destroy',$comment->id) }}" method="POST">



{{--                            <a class="btn btn-primary" href="{{ route('ManifestsComment.edit',$comment->id) }}">Edit</a>--}}

                            @csrf
                            @method('DELETE')

                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>

        <form action="{{ route('tblmanifestsave') }}" method="POST">
            @csrf

            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">

                        <input type="hidden" name="seeker_id" value="{{$seeker->userID}}" class="form-control" placeholder="Name">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Detail:</strong>
                        <textarea  id="elm1" class="form-control" style="height:150px" name="detail" placeholder="Detail"></textarea>
                    </div>
                </div>
                <p></p>
                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>

        </form>
</div>
<script src="/assets/libs/tinymce/tinymce.min.js"></script>

<!-- init js -->
<script src="/assets/js/pages/form-editor.init.js"></script>

<script src="/assets/js/app.js"></script>
@endsection
