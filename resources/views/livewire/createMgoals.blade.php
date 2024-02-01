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
                            <textarea class="form-control" rows="3" placeholder="Enter Goal" wire:model="name" ></textarea>

                            @error('name') <span class="text-danger">{{ $message }}</span>@enderror
                        </div>
                    </div>

                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Staff:</label>
                            <select class="form-control"  wire:model="staff_id" disabled>

                                    <option  value="{{ $staff->user_id }}">{{ $staff->staff->first_name .' '.$staff->staff->other_name .' '.$staff->staff->last_name}}</option>

                            </select>
                            @error('staff_id') <span class="text-danger">{{ $message }}</span> @enderror

                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Achievement:</label>
                            <textarea class="form-control" rows="3" placeholder="Enter achievement"  wire:model="achievement" ></textarea>
{{--                            <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Enter achievement" wire:model="achievement">--}}
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
{{--                    <div class="col-sm-6">--}}
{{--                        <div class="form-group">--}}
{{--                            <label for="exampleFormControlInput1">Score:</label>--}}
{{--                            <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Enter score" wire:model="score">--}}
{{--                            @error('score') <span class="text-danger">{{ $message }}</span>@enderror--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="col-sm-6">--}}
{{--                        <div class="form-group">--}}
{{--                            <label for="exampleFormControlInput1">Supervisor Score:</label>--}}
{{--                            <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Enter supervisor score" wire:model="supervisor_score">--}}
{{--                            @error('supervisor_score') <span class="text-danger">{{ $message }}</span>@enderror--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="col-sm-6">--}}
{{--                        <div class="form-group">--}}
{{--                            <label for="exampleFormControlInput1">HR Score:</label>--}}
{{--                            <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Enter HR score" wire:model="hr_score">--}}
{{--                            @error('hr_score') <span class="text-danger">{{ $message }}</span>@enderror--}}
{{--                        </div>--}}
{{--                    </div>--}}
                </div>


                <button wire:click.prevent="store()" class="btn btn-success">Save</button>
            </form>
        </div>
    </div>
    </div>
</div>
