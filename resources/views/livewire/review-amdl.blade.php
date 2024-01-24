<div>
    <div class="row">
        <div class="col-sm-12 ">
                @if (session()->has('message'))
                    <div class="alert alert-success">
                        {{ session('message') }}
                    </div>
                @endif
             <div class="card">

            <div class="card-body table-responsive">
                <table id="example1" class="table table-bordered table-striped">

                           <tr>

                            <th>Date Of Review</th>
                            <th>Rank</th>
                            <th>Salary</th>

                        </tr>
                        @foreach($contacts as $key => $value)
                            <tr>

                                <td>{{ $value->date_of_review }}</td>
                                <td>{{ $value->rank->rank }}</td>
                                <td>{{ $value->salary }}</td>

                            </tr>
                        @endforeach
                </table>
            </div>
        </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-10 ">
            <div class="card">
                <div class="card-body">
                     <form>
        <div class=" add-input">
            <div class="row">
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Date of review:</label>
                        <input type="date" class="form-control" placeholder="Enter Review Date" wire:model="date_of_review.0">
                        @error('date_of_review.0') <span class="text-danger error">{{ $message }}</span>@enderror
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Rank:</label>
                        <select class="form-control"  wire:model="rank.0">
                            <option value="0">Select Rank</option>
                            @foreach($ranks as $level)
                            <option value="{{$level->id}}">{{$level->rank}}</option>
                            @endforeach

                        </select>
{{--                        <input type="text" class="form-control" wire:model="rank.0" placeholder="Enter Rank">--}}
                        @error('rank.0') <span class="text-danger error">{{ $message }}</span>@enderror
                    </div>
                </div>

                <div class="col-sm-3">
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Salary:</label>
                        <input type="number" class="form-control" wire:model="salary.0" placeholder="Enter Salary">
                        @error('salary.0') <span class="text-danger error">{{ $message }}</span>@enderror
                    </div>
                </div>
                <div class="col-sm-2">
                    <br>
                    <button class="btn text-white btn-info btn-sm" wire:click.prevent="add({{$i}})">Add</button>
                </div>
            </div>
        </div>

        @foreach($inputs as $key => $value)
            <p></p>
            <div class=" add-input">
                <div class="row">
                    <div class="col-sm-4">
                        <div class="form-group">
                            <input type="date" class="form-control" placeholder="Enter Review Date" wire:model="date_of_review.{{ $value }}">
                            @error('date_of_review.'.$value) <span class="text-danger error">{{ $message }}</span>@enderror
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group">
                            <select class="form-control" wire:model="rank.{{ $value }}">
                                @foreach($ranks as $level)
                                    <option value="{{$level->id}}">{{$level->rank}}</option>
                                @endforeach

                            </select>
                            {{--                        <input type="text" class="form-control" wire:model="rank.0" placeholder="Enter Rank">--}}
                            @error('rank.'.$value) <span class="text-danger error">{{ $message }}</span>@enderror

                        </div>

                    </div>
                    <div class="col-sm-3">
                        <div class="form-group">
                            <input type="number" class="form-control" wire:model="salary.{{ $value }}" placeholder="Enter Salary">
                            @error('salary.'.$value) <span class="text-danger error">{{ $message }}</span>@enderror
                        </div>
                    </div>
                    <div class="col-sm-2">
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
            </div>
        </div>
    </div>
</div>
