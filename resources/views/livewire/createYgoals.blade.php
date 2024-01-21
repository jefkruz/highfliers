<div class="row">
    <div class="col-sm-10 ">
        <div class="card">
        <div class="card-body">
            <form>
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



                <button wire:click.prevent="store()" class="btn btn-success">Save</button>
            </form>
        </div>
    </div>
    </div>
</div>
