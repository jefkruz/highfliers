<div>
    @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif
        <div class="card-body table-responsive">
        <table id="example1" class="table table-bordered table-striped">
        <tr>

            <th>Monthly Goals</th>
            <th>Start Date</th>
            <th>End Date</th>


            <th>Achievement</th>
            <th>Staff Score</th>
            <th>Supervisor Score</th>
            <th>HR Score</th>
        </tr>
        @foreach($contacts as $key => $value)
            <tr>

                <td>{{ $value->monthy_goals }}</td>
                <td>{{ $value->timeline }}</td>
                <td>{{ $value->end_date }}</td>


                <td>{{ $value->achievement }}</td>
                <td>{{ $value->staff_score }}</td>
                <td>{{ $value->supervisor_score }}</td>
                <td>{{ $value->hr_score }}</td>
            </tr>
        @endforeach
    </table>
        </div>
    <form>
        <div class=" add-input">
            <div class="row">
                <div class="col-md-2">
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Enter Monthly Goals" wire:model="monthy_goals.0" required>
                        @error('monthy_goals.0') <span class="text-danger error">{{ $message }}</span>@enderror
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <input type="date" class="form-control" wire:model="timeline.0" placeholder="Enter Timeline" required>
                        @error('timeline.0') <span class="text-danger error">{{ $message }}</span>@enderror
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <input type="date" class="form-control" wire:model="end_date.0" placeholder="Enter End Date" required>
                        @error('end_date.0') <span class="text-danger error">{{ $message }}</span>@enderror
                    </div>
                </div>




                <div class="col-md-3">
                    <div class="form-group">

                        <textarea name="" wire:model="achievement.0" placeholder="Enter Achievement" required></textarea>
                        @error('achievement.0') <span class="text-danger error">{{ $message }}</span>@enderror
                    </div>
                </div>


                <div class="col-md-2">
                    <div class="form-group">

                    <select class="form-control" wire:model="staff_score.0">
                        <option selected value="0">Staff Score</option>
                        <option value="0">NOT PRESENT </option>
                        <option value="2">UNSATISFACTORY</option>
                        <option value="5">INCONSISTENT</option>
                        <option value="7">EFFECTIVE</option>
                        <option value="9">HIGHLY EFFECTIVE</option>
                        <option value="10">EXCEPTIONALLY EFFECTIVE</option>
                    </select>
                        @error('staff_score.0') <span class="text-danger error">{{ $message }}</span>@enderror
                    </div>
                </div>
                <div class="col-md-2">
                    <button class="btn text-white btn-info btn-sm" wire:click.prevent="add({{$i}})">Add</button>
                </div>
            </div>
        </div>

        @foreach($inputs as $key => $value)
            <p></p>
            <div class=" add-input">
                <div class="row">
                    <div class="col-md-2">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Enter Monthly Goals" wire:model="monthy_goals.{{ $value }}">
                            @error('monthy_goals.'.$value) <span class="text-danger error">{{ $message }}</span>@enderror
                        </div>
                    </div>

                    <div class="col-md-2">
                        <div class="form-group">
                            <input type="date" class="form-control" wire:model="timeline.{{ $value }}" placeholder="Enter Timeline">
                            @error('timeline.'.$value) <span class="text-danger error">{{ $message }}</span>@enderror
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <input type="date" class="form-control" wire:model="end_date.{{ $value }}" placeholder="Enter End Date">
                            @error('end_date.'.$value) <span class="text-danger error">{{ $message }}</span>@enderror
                        </div>
                    </div>


                    <div class="col-md-3">
                        <div class="form-group">

                            <textarea name="" wire:model="achievement.{{ $value }}" placeholder="Enter Achievement" required></textarea>
                            @error('achievement.0') <span class="text-danger error">{{ $message }}</span>@enderror
                        </div>
                    </div>


                    <div class="col-md-2">
                        <label class="visually-hidden" for="autoSizingSelect">Preference</label>
                        <select class="form-select" wire:model="staff_score.{{ $value }}" >
                            <option selected value="0">Staff Score</option>
                            <option value="0">NOT PRESENT </option>
                            <option value="2">UNSATISFACTORY</option>
                            <option value="5">INCONSISTENT</option>
                            <option value="7">EFFECTIVE</option>
                            <option value="9">HIGHLY EFFECTIVE</option>
                            <option value="10">EXCEPTIONALLY EFFECTIVE</option>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <button class="btn btn-danger btn-sm" wire:click.prevent="remove({{$key}})">Remove</button>
                    </div>
                </div>
            </div>
        @endforeach
        <p></p>
        <div class="row">
            <div class="col-md-12">
                <button type="button" wire:click.prevent="store()" class="btn btn-success btn-sm">Submit</button>
            </div>
        </div>

    </form>
</div>
