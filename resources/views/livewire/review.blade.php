<div>
    @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif

    <table class="table table-bordered">
        <tr>

            <th>Date Of Review</th>
            <th>Rank</th>
            <th>Salary</th>
        </tr>
        @foreach($contacts as $key => $value)
            <tr>

                <td>{{ $value->date_of_review }}</td>
                <td>{{ $value->rank }}</td>
                <td>{{ $value->salary }}</td>
            </tr>
        @endforeach
    </table>

    <form>
        <div class=" add-input">
            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        <input type="date" class="form-control" placeholder="Enter Review Date" wire:model="date_of_review.0">
                        @error('date_of_review.0') <span class="text-danger error">{{ $message }}</span>@enderror
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <input type="text" class="form-control" wire:model="rank.0" placeholder="Enter Rank">
                        @error('rank.0') <span class="text-danger error">{{ $message }}</span>@enderror
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="form-group">
                        <input type="number" class="form-control" wire:model="salary.0" placeholder="Enter Salary">
                        @error('salary.0') <span class="text-danger error">{{ $message }}</span>@enderror
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
                    <div class="col-md-3">
                        <div class="form-group">
                            <input type="date" class="form-control" placeholder="Enter Review Date" wire:model="date_of_review.{{ $value }}">
                            @error('date_of_review.'.$value) <span class="text-danger error">{{ $message }}</span>@enderror
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <input type="text" class="form-control" wire:model="rank.{{ $value }}" placeholder="Enter Rank">
                            @error('rank.'.$value) <span class="text-danger error">{{ $message }}</span>@enderror
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <input type="number" class="form-control" wire:model="salary.{{ $value }}" placeholder="Enter Salary">
                            @error('salary.'.$value) <span class="text-danger error">{{ $message }}</span>@enderror
                        </div>
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