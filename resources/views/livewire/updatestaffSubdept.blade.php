<div class="row">
    <div class="col-sm-10 ">
        <div class="card">
            <div class="card-body">
              <form>
    <div class="row mb-4">
        <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">First Name</label>
        <div class="col-sm-9">
            <input type="text" required class="form-control" wire:model="firstName">
            @error('firstName') <span class="text-danger">{{ $message }}</span>@enderror
        </div>
    </div>

    <div class="row mb-4">
        <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Other Name</label>
        <div class="col-sm-9">
            <input type="text" class="form-control" id="horizontal-firstname-input"   wire:model="otherName">
            @error('otherName') <span class="text-danger">{{ $message }}</span>@enderror
        </div>
    </div>


    <div class="row mb-4">
        <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Last Name</label>
        <div class="col-sm-9">
            <input type="text" class="form-control" id="horizontal-firstname-input" required   wire:model="lastName">
            @error('LastName') <span class="text-danger">{{ $message }}</span>@enderror
        </div>
    </div>

        <div class="row mb-4">
            <label for="horizontal-email-input" class="col-sm-3 col-form-label">Unit</label>
            <div class="col">

                <select class="form-control" id="autoSizingSelect" wire:model="sub_dept_id">
                    <option selected>Choose...</option>
                    @foreach ($supDepts as $supDept)
                        <option value="{{$supDept->id}}">{{$supDept->name}}</option>
                    @endforeach
                </select>
                                @error('sub_dept_id') <span class="text-danger">{{ $message }}</span>@enderror
            </div>
        </div>

{{--    <div class="row mb-4">--}}
{{--        <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Nomenclature Rank</label>--}}
{{--        <div class="col-sm-9">--}}
{{--            <input type="text" class="form-control" id="horizontal-firstname-input" required   wire:model="nomenclature_rank">--}}
{{--            @error('nomenclature_rank') <span class="text-danger">{{ $message }}</span>@enderror--}}
{{--        </div>--}}
{{--    </div>--}}

    <div class="row justify-content-end">
        <div class="col-sm-9">



            <div>

                <button wire:click.prevent="updateSubUser()" class="btn btn-dark">Update</button>
                <button wire:click.prevent="cancel()" class="btn btn-danger">Cancel</button>
            </div>
        </div>
    </div>
</form>
            </div>
        </div>
    </div>
</div>

