{{--<formcreate.blade.php>--}}
{{--    <input type="hidden" wire:model="goal_id">--}}
{{--    <div class="form-group">--}}
{{--        <label for="exampleFormControlInput1">Rank Nomenclature Category:</label>--}}
{{--        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Enter Title" wire:model="rank">--}}
{{--        @error('rank') <span class="text-danger">{{ $message }}</span>@enderror--}}
{{--    </div>--}}

{{--    <button wire:click.prevent="update()" class="btn btn-dark">Update</button>--}}
{{--    <button wire:click.prevent="cancel()" class="btn btn-danger">Cancel</button>--}}
{{--</formcreate.blade.php>--}}

<div class="row">
    <div class="col-sm-10 ">
        <div class="card">
            <div class="card-body">
                <formcreate.blade.php>
                    <input type="hidden" wire:model="goal_id">
                    <div class="row">
                        <div class="col-sm-9">
                            <div class="form-group">
                                <label for="exampleFormControlInput1">Goal Name:</label>
                                <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Enter Goal" wire:model="name">
                                @error('name') <span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label for="exampleFormControlInput1">Year:</label>
                                <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Enter Year" wire:model="year">
                                @error('year') <span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                        </div>
                    </div>



                    <button wire:click.prevent="update()" class="btn btn-primary">Update</button>
                    <button wire:click.prevent="cancel()" class="btn btn-danger">Cancel</button>
                </formcreate.blade.php>
            </div>
        </div>
    </div>
</div>
