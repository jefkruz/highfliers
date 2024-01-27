
<form>
    <div class="row mb-4">
        <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Date of review:</label>
        <div class="col-sm-9">

            <input type="date" class="form-control" placeholder="Enter Review Date" wire:model="date_of_review.0">
            @error('date_of_review.0') <span class="text-danger error">{{ $message }}</span>@enderror
        </div>
    </div>

    <div class="row mb-4">
        <label for="horizontal-email-input" class="col-sm-3 col-form-label">Rank Type</label>
        <div class="col">
        <select class="form-control"  wire:model="rank.0">

            <option value="0">Select Rank</option>
            @foreach($ranks as $level)
                <option value="{{$level->id}}">{{$level->rank}}</option>
            @endforeach

        </select>
        </div>
        @error('rank.0') <span class="text-danger error">{{ $message }}</span>@enderror
    </div>


    <div class="row mb-4">
        <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Salary</label>
        <div class="col-sm-9">

            <input type="number" class="form-control" wire:model="salary.0" placeholder="Enter Salary">
            @error('salary.0') <span class="text-danger error">{{ $message }}</span>@enderror
        </div>
    </div>


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


    @if($cat_id !=0)
        <div class="row mb-4">
            <label for="horizontal-email-input" class="col-sm-3 col-form-label">Nomenclature Groups</label>
            <div class="col">

                <select class="form-control" id="autoSizingSelect"  wire:change="getNomRank" wire:model="nomGroup_id">
                    <option selected>Choose...</option>
                    @foreach ($nomGroups as $nomGroup)
                        <option value="{{$nomGroup->id}}">{{$nomGroup->name}}</option>
                    @endforeach
                </select>
                {{--  @error('nomGroup_id') <span class="text-danger">{{ $message }}</span>@enderror--}}
            </div>
        </div>
    @endif


    @if( $cat_id !=0 && $nomGroup_id !=0)
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
{{--            <input type="text" class="form-control" id="horizontal-firstname-input" required   wire:model="nomenclature_rank">--}}
{{--            @error('nomenclature_rank') <span class="text-danger">{{ $message }}</span>@enderror--}}
{{--        </div>--}}
{{--    </div>--}}

    <div class="row justify-content-end">
        <div class="col-sm-9">



            <div>

                <button wire:click.prevent="store()" class="btn btn-success">Update</button>
                <button wire:click.prevent="cancel()" class="btn btn-danger">Cancel</button>
            </div>
        </div>
    </div>
</form>
