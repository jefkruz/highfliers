
<form>
    <div class="row mb-4">
        <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Supervisor Score</label>
        <div class="col-sm-9">


            <div class="col-md-2">
                <label class="visually-hidden" for="autoSizingSelect">Preference</label>
                <select class="form-select" wire:model="supervisor_score" >
                    <option selected value="0">Supervisor Score</option>
                    <option value="0">NOT PRESENT </option>
                    <option value="2">UNSATISFACTORY</option>
                    <option value="5">INCONSISTENT</option>
                    <option value="7">EFFECTIVE</option>
                    <option value="9">HIGHLY EFFECTIVE</option>
                    <option value="10">EXCEPTIONALLY EFFECTIVE</option>
                </select>
                @error('supervisor_score') <span class="text-danger">{{ $message }}</span>@enderror
            </div>
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
