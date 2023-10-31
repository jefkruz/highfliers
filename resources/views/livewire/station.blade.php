<div>
    {{-- Because she competes with no one, no one can compete with her. --}}

    <form >
        <div class="input-group">
            <input type="text" wire:model="search" class="form-control" placeholder="Search...">

        </div>
    </form><br>
    <div class="row">
        @foreach ($organizations as $organization)
            @php
                $id= $organization->stationID;
                 $str=$organization->stationName;
     preg_match_all('/(?<=\b)\w/iu',$str,$matches);
     $result=mb_strtoupper(implode('',$matches[0]));
            $encrypt = Crypt::encrypt($id)
            @endphp
            <div class="col-xl-3 col-sm-6 mt-5">
                <!-- Widget: user widget style 1 -->
                <div class="info-box bg-primary">
                    <span class="info-box-icon"><i class="fa fa-church"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text"><b>{{ucwords($organization->stationName)  }}</b></span>
                        <span class="info-box-number">{{$result}}</span>

                        <a href="{{url('/deptall/'.$encrypt)}}" class="btn btn-outline-light">
                            {{ $organization->tblDept->count() }}(DEPT)
                </a>
                    </div>
                    <!-- /.info-box-content -->
                </div>



            </div>
        @endforeach


    </div>
</div>
