<div class="row">
    <div class="col-sm-10 ">
        <div class="card">
            <div class="card-body">
                <form>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Rank Nomenclature Group:</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Enter Group" wire:model="rank">
                        @error('rank') <span class="text-danger">{{ $message }}</span>@enderror
                    </div>

                    <button wire:click.prevent="store()" class="btn btn-success">Save</button>
                </form>
            </div>
        </div>
    </div>
</div>
