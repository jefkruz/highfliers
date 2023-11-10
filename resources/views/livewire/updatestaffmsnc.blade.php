
<form>
    <div class="row mb-4">
        <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">First Name</label>
        <div class="col-sm-9">
            <input type="text" required class="form-control" wire:model="firstName">
            @error('firstName') <span class="text-danger">{{ $message }}</span>@enderror
        </div>
    </div>

{{--    <div class="row mb-4">--}}
{{--        <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Other Name</label>--}}
{{--        <div class="col-sm-9">--}}
{{--            <input type="text" class="form-control" id="horizontal-firstname-input"  required   wire:model="otherName">--}}
{{--            @error('otherName') <span class="text-danger">{{ $message }}</span>@enderror--}}
{{--        </div>--}}
{{--    </div>--}}


    <div class="row mb-4">
        <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Last Name</label>
        <div class="col-sm-9">
            <input type="text" class="form-control" id="horizontal-firstname-input" required   wire:model="lastName">
            @error('LastName') <span class="text-danger">{{ $message }}</span>@enderror
        </div>
    </div>
    <div class="row mb-4">
        <label for="horizontal-email-input" class="col-sm-3 col-form-label">Rank Type</label>
        <div class="col">

            <select wire:model="company" wire:change="getCompanies" class="form-control" required>
                {{--                <select name="company" id="company" class="form-control" required>--}}
                <option value="">Rank Type</option>
                <option value="rank">Rank</option>
                <option value="nomenclature">Nomenclature</option>
            </select>
            @error('company') <span class="text-danger">{{ $message }}</span>@enderror
        </div>
    </div>


    @if($company == 'rank')
    <div class="row mb-4">
        <label for="horizontal-email-input" class="col-sm-3 col-form-label">Ranks</label>
        <div class="col">

            <select class="form-control" id="autoSizingSelect" wire:model="rank">
                <option selected>Choose...</option>
                @foreach ($ranks as $rank)
                <option value="{{$rank->id}}">{{$rank->rank}}</option>
                @endforeach
            </select>
            @error('rank') <span class="text-danger">{{ $message }}</span>@enderror
        </div>
    </div>
    @endif


    @if($company == 'nomenclature')
        <div class="row mb-4">
            <label for="horizontal-email-input" class="col-sm-3 col-form-label">Nomenclature Categories</label>
            <div class="col">

                <select class="form-control" id="autoSizingSelect" wire:change="getNomGroup" wire:model="cat_id">
                    <option selected>Choose...</option>
                    @foreach ($cats as $cat)
                        <option value="{{$cat->id}}">{{$cat->name}}</option>
                    @endforeach
                </select>
{{--                @error('cat_id') <span class="text-danger">{{ $message }}</span>@enderror--}}
            </div>
        </div>
    @endif

    @if($company == 'nomenclature' && $cat_id !=0)
        <div class="row mb-4">
            <label for="horizontal-email-input" class="col-sm-3 col-form-label">Nomenclature Groups</label>
            <div class="col">

                <select class="form-control" id="autoSizingSelect"  wire:change="getNomRank" wire:model="nomGroup_id">
                    <option selected>Choose...</option>
                    @foreach ($nomGroups as $nomGroup)
                        <option value="{{$nomGroup->id}}">{{$nomGroup->name}}</option>
                    @endforeach
                </select>
{{--                @error('nomGroup_id') <span class="text-danger">{{ $message }}</span>@enderror--}}
            </div>
        </div>
    @endif


    @if($company == 'nomenclature' && $cat_id !=0 && $nomGroup_id !=0)
        <div class="row mb-4">
            <label for="horizontal-email-input" class="col-sm-3 col-form-label">Nomenclature Ranks</label>
            <div class="col">

                <select class="form-control" id="autoSizingSelect" wire:model="nomRank_id">
                    <option selected>Choose...</option>
                    @foreach ($nomRanks as $rank)
                        <option value="{{$rank->id}}">{{$rank->name}}</option>
                    @endforeach
                </select>
{{--                @error('nomRank_id') <span class="text-danger">{{ $message }}</span>@enderror--}}
            </div>
        </div>
    @endif
{{--    <div class="row mb-4">--}}
{{--        <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Nomenclature Rank</label>--}}
{{--        <div class="col-sm-9">--}}
{{--            <input type="text" class="form-control" id="horizontal-firstname-input"   wire:model="nomenclature_rank">--}}
{{--            @error('nomenclature_rank') <span class="text-danger">{{ $message }}</span>@enderror--}}
{{--        </div>--}}
{{--    </div>--}}

    <div class="row justify-content-end">
        <div class="col-sm-9">



            <div>

                <button wire:click.prevent="update()" class="btn btn-dark">Update</button>
                <button wire:click.prevent="cancel()" class="btn btn-danger">Cancel</button>
            </div>
        </div>
    </div>
</form>
