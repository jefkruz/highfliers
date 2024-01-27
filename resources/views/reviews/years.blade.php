@extends('layouts.admin')

@section('content')
    <div class="row">

         @foreach($years as $year)

            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-blue">

                    <div class="inner">
                        <a href="{{route('reviews.index',['id1' => encrypt($dept_id), 'id2' => encrypt($year->year)])}}">
                        <h3 class="text-white">{{$year->count}}</h3>

                        <p class="text-white">{{$year->year}} </p>
                        </a>
                    </div>
                    <a href="{{route('reviews.index',['id1' => encrypt($dept_id), 'id2' => encrypt($year->year)])}}">
                    <div class="icon">
                        <i class="fa fa-magnifying-glass"></i>
                    </div>
                    </a>
                    <a href="{{route('reviews.index',['id1' => encrypt($dept_id), 'id2' => encrypt($year->year)])}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>

                </div>

            </div>
        @endforeach



    </div>
@endsection
