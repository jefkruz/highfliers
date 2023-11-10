<formcreate.blade.php>
    <input type="hidden" wire:model="post_id">
    <div class="form-group">
        <label for="exampleFormControlInput1">Rank Nomenclature Rank:</label>
        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Enter Rank" wire:model="rank">
        @error('rank') <span class="text-danger">{{ $message }}</span>@enderror
    </div>

    <button wire:click.prevent="update()" class="btn btn-dark">Update</button>
    <button wire:click.prevent="cancel()" class="btn btn-danger">Cancel</button>
</formcreate.blade.php>
