<div>
    {{-- Because she competes with no one, no one can compete with her. --}}
    <a class="nav-link" href="{{url('/adddirector')}}">
        <button type="button" class="mb-1 mt-1 me-1 btn btn-success"> Add Director</button>
    </a>

    <form class="app-search  d-lg">
        <div class="position-relative">
            <input type="text" wire:model="search" class="form-control" placeholder="Search...">
            <span class="bx bx-search-alt"></span>
        </div>
    </form>
    <div class="row">
        @foreach ($organizations as $organization)

            <div class="col-xl-3 col-sm-6">
                <div class="card text-center">
                    <div class="card-body">
                        <div class="avatar-sm mx-auto mb-4">

                        </div>
                        <h4 class="btn btn-success" >{{ $organization->organization->name }}</h4>
                        <h5 class="font-size-15 mb-1"><a href="javascript: void(0);" class="text-dark">{{ $organization->name }}</a></h5>
{{--                        <p class="text-muted"><a href="/organizations/{{$organization->id}}"> {{ $organization->seeker->count() }}</a></p>--}}


                    </div>

                </div>
            </div>
        @endforeach


    </div>
</div>
