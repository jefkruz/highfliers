<div>

    <form >
        <div class="input-group">
            <input type="text" wire:model="search" class="form-control form-control-lg" placeholder="Search for organizations here...">

        </div>
    </form><br>

    <div class="row">

        @foreach ($organizations as  $key=> $organization)
            @php

             $id= $organization->id;
              $str=$organization->name;
  preg_match_all('/(?<=\b)\w/iu',$str,$matches);
  $result=mb_strtoupper(implode('',$matches[0]));

           @endphp
        <div class="col-xl-3 col-sm-6 mt-5">

            <a href="{{route('organizations.show',$organization->id)}}">

                    <div class="info-box bg-primary">
                        <span class="info-box-icon"><i class="fa fa-people-roof"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text"><b>{{ucwords($organization->name)  }}</b></span>
                            <span class="info-box-number">{{$result}}</span>

                            <span class="btn btn-outline-light">
                 {{ $organization->seeker->count() }} Staff Members
                </span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>





            </a>
        </div>

        @endforeach


    </div>
</div>
