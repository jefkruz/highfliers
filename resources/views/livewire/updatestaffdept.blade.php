
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
        <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">BLW Portal ID</label>
        <div class="col-sm-9">
            <input type="text" class="form-control" id="horizontal-firstname-input" required   wire:model="blw_portal_id">
            @error('blw_portal_id') <span class="text-danger">{{ $message }}</span>@enderror
        </div>
    </div>
    <div class="row mb-4">
        <label for="horizontal-email-input" class="col-sm-3 col-form-label">Ranks</label>
        <div class="col-sm-9">

            <select class="form-control" id="autoSizingSelect" wire:model="rank">
                <option selected>Choose...</option>
                @foreach ($ranks as $rank)
                <option value="{{$rank->id}}">{{$rank->rank}}</option>
                @endforeach
            </select>
            @error('rank') <span class="text-danger">{{ $message }}</span>@enderror
        </div>
    </div>
    <div class="row mb-4">
        <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Nomenclature Rank</label>
        <div class="col-sm-9">
            <input type="text" class="form-control" id="horizontal-firstname-input" required   wire:model="nomenclature_rank">
            @error('nomenclature_rank') <span class="text-danger">{{ $message }}</span>@enderror
        </div>
    </div>

    <div class="row justify-content-end">
        <div class="col-sm-9">



            <div>

                <button wire:click.prevent="update()" class="btn btn-dark">Update</button>
                <button wire:click.prevent="cancel()" class="btn btn-danger">Cancel</button>
            </div>
        </div>
    </div>
</form>
