<div class="row">
    <div class="col-sm-10 ">
        <div class="card">
        <div class="card-body">
            <form>

                        <div class="form-group">
                            <label for="exampleFormControlInput1">Staff Name:</label>
                            <select class="form-control "  wire:model="user_id" >
                                <option selected>Select Staff...</option>
                                @foreach ($members as $member)
                                    <option value="{{$member->userID}}">{{$member->firstName .' '.$member->lastName}}</option>
                                @endforeach
                            </select>
                            @error('user') <span class="text-danger">{{ $message }}</span>@enderror
                        </div>




                <button wire:click.prevent="store()" class="btn btn-success">Save</button>
                <button wire:click.prevent="cancel()" class="btn btn-danger">Cancel</button>
            </form>
        </div>
    </div>
    </div>
</div>
