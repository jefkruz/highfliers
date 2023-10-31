<form>
    <div class="form-group">
        <label for="exampleFormControlInput1">Rank:</label>
        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Enter Rank" wire:model="rank">
        @error('rank') <span class="text-danger">{{ $message }}</span>@enderror
    </div>

    <button wire:click.prevent="store()" class="btn btn-success">Save</button>
</form>