<div class="">
    @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif
    <form  >


    <div class="row">

        <div class="col-md-12">
            <div class="form-group">
                <label for="">Full Name</label>
                <input type="text" class="form-control"  placeholder="Full Name" name="name" wire:model="name">
                @error('name') <span class="text-danger">{{ $message }}</span>@enderror
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <label for="">KingsChat Username</label>
                <input type="text" class="form-control" wire:model="username" placeholder="KingsChat Username" name="username">
                @error('username') <span class="text-danger">{{ $message }}</span>@enderror
            </div>
        </div>

        <div class="col-md-12">
            <div class="form-group">
                <label for="">Recruitment Company</label>
                <select wire:model="company" wire:change="getCompanies" class="form-control" required>
{{--                <select name="company" id="company" class="form-control" required>--}}
                    <option value="">Recruitment Company</option>
                    <option value="msnc">MSNC</option>
                    <option value="amdl">AMDL</option>
                </select>
                @error('company') <span class="text-danger">{{ $message }}</span>@enderror
            </div>
        </div>
{{--        {{$company}}--}}

      @if($company == 'amdl')
        <div  class="col-md-12" >
            <div class="form-group">
                <label for="">AMDL Organizations</label>
                <select name="organization_id" wire:model="organization_id" class="form-control">
                    <option value="">--Select Organization--</option>

                    @foreach($organization as $org)
                        <option value="{{$org->id}}">{{$org->name}}</option>
                    @endforeach
                </select>
                @error('organization_id') <span class="text-danger">{{ $message }}</span>@enderror
            </div>
        </div>

        @endif
        @if($company == 'msnc')
            <div  class="col-md-12" >
                <div class="form-group">
                    <label for="">MSNC Stations</label>
                    <select name="station_id" wire:model="station_id" wire:change="getDepartments"  class="form-control">
                        <option value="">--Select Station--</option>
                        @foreach($station as $stat)
                            <option value="{{$stat->stationID}}">{{$stat->stationName}}</option>
                        @endforeach
                    </select>
                    @error('station_id') <span class="text-danger">{{ $message }}</span>@enderror
                </div>
            </div>

        @endif


        @if($station_id != 0 && $company == 'msnc')
        <div  class="col-md-12" >
            <div class="form-group">
                <label for="">MSNC Departments</label>
                <select name="department_id" wire:model="department_id" class="form-control">
                    <option value="">--Select Department--</option>

                    @if(!empty($department))
                        @foreach($department as $dept)
                            <option value="{{ $dept->deptID }}">{{ $dept->deptName }}</option>
                        @endforeach
                    @endif
                </select>
                @error('department_id') <span class="text-danger">{{ $message }}</span>@enderror
            </div>
        </div>
        @endif
        <div class="col-md-12">
            <label for="">Role</label>
            <select name="role_id" wire:model="role_id" class="form-control " >

                    <option value="">--Select Role--</option>
                    @foreach($roles as $role)

                        <option value="{{$role->id}}">{{$role->display_name}}</option>

                    @endforeach


            </select>
            @error('role_id') <span class="text-danger">{{ $message }}</span>@enderror
        </div>


    </div>
    <div class="box-footer mt-2">
        <button wire:click.prevent="store()"  class="btn btn-primary">Submit</button>
    </div>
    </form>
</div>
