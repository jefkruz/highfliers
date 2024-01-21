<br>
<div class="row">
    <div class="col-sm-12 ">
        <div class="card">
        <div class="card-body">
            <form>
                <div class="row">
                    <div class="col-sm-8">
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Goal Name:</label>
                            <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Enter Goal" wire:model="name">
                            @error('name') <span class="text-danger">{{ $message }}</span>@enderror
                        </div>
                    </div>

                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Staff:</label>
                            <select class="form-control"  wire:model="staff_id">
                                <option selected value="">Assign Staff</option>
                                @foreach($staffs as $staff)
                                    <option  value="{{ $staff->user_id }}">{{ $staff->staff->first_name .' '.$staff->staff->other_name .' '.$staff->staff->last_name}}</option>
                                @endforeach
                            </select>
                            @error('staff_id') <span class="text-danger">{{ $message }}</span> @enderror

{{--                            <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Enter Year" wire:model="year">--}}
{{--                            @error('year') <span class="text-danger">{{ $message }}</span>@enderror--}}
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Achievement:</label>
                            <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Enter achievement" wire:model="achievement">
                            @error('achievement') <span class="text-danger">{{ $message }}</span>@enderror
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Timeline:</label>
                            <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Enter timeline" wire:model="timeline">
                            @error('timeline') <span class="text-danger">{{ $message }}</span>@enderror
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="exampleFormControlInput1">End Date:</label>
                            <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Enter deadline" wire:model="end_date">
                            @error('end_date') <span class="text-danger">{{ $message }}</span>@enderror
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Score:</label>
                            <select class="form-control" wire:model="score">
                                <option selected value="0">Select Score</option>
                                <option value="10">10 </option>
                                <option value="9">9</option>
                                <option value="8">8</option>
                                <option value="7">7</option>
                                <option value="6">6</option>
                                <option value="5">5</option>
                                <option value="4">4</option>
                                <option value="3">3</option>
                                <option value="2">2</option>
                                <option value="1">1</option>
                                <option value="0">0</option>
                            </select>
                            @error('score') <span class="text-danger">{{ $message }}</span>@enderror
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Supervisor Score:</label>
                            <select class="form-control" wire:model="supervisor_score">
                                <option selected value="0">Select Score</option>
                                <option value="10">10 </option>
                                <option value="9">9</option>
                                <option value="8">8</option>
                                <option value="7">7</option>
                                <option value="6">6</option>
                                <option value="5">5</option>
                                <option value="4">4</option>
                                <option value="3">3</option>
                                <option value="2">2</option>
                                <option value="1">1</option>
                                <option value="0">0</option>
                            </select>
                            @error('supervisor_score') <span class="text-danger">{{ $message }}</span>@enderror
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="exampleFormControlInput1">HR Score:</label>
                            <select class="form-control" wire:model="hr_score">
                                <option selected value="0">Select Score</option>
                                <option value="10">10 </option>
                                <option value="9">9</option>
                                <option value="8">8</option>
                                <option value="7">7</option>
                                <option value="6">6</option>
                                <option value="5">5</option>
                                <option value="4">4</option>
                                <option value="3">3</option>
                                <option value="2">2</option>
                                <option value="1">1</option>
                                <option value="0">0</option>
                            </select>
                            @error('hr_score') <span class="text-danger">{{ $message }}</span>@enderror
                        </div>
                    </div>
                </div>


                <button wire:click.prevent="update()" class="btn btn-primary">Update</button>
                <button wire:click.prevent="cancel()" class="btn btn-danger">Cancel</button>
            </form>
        </div>
    </div>
    </div>
</div>
