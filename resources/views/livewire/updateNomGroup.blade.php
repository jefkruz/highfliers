<div class="row">
    <div class="col-sm-10 ">
        <div class="card">
            <div class="card-body">
                <formcreate.blade.php>
                    <input type="hidden" wire:model="post_id">
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Rank Nomenclature Group:</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Enter Group" wire:model="rank">
                        @error('rank') <span class="text-danger">{{ $message }}</span>@enderror
                    </div>

                    <button wire:click.prevent="update()" class="btn btn-dark">Update</button>
                    <button wire:click.prevent="cancel()" class="btn btn-danger">Cancel</button>
                </formcreate.blade.php>

            </div>
        </div>
    </div>
</div>
