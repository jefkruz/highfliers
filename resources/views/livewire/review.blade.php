<div>
    <div class="row">
        <div class="col-sm-12 ">
                @if (session()->has('message'))
                    <div class="alert alert-success">
                        {{ session('message') }}
                    </div>
                @endif

                    @if($updateMode)
                        <div class="row">
                            <div class="col-sm-10 ">
                                <div class="card">
                                    <div class="card-body">
                                        @include('livewire.updatestaffreview')
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif

                    <div class="card">
                        <div class="card-header">
                            <div style="display: flex; justify-content: space-between; align-items: center;">



                                <div class="float-right">
                                    <button  wire:click="edit({{ $user}})"   class="btn btn-success btn-sm m-1"> <i class="fa fa-magnifying-glass"></i> Add Review</button>

                                </div>
                            </div>
                        </div>

                        <div class="card-body table-responsive">
                            <table id="example1" class="table table-bordered table-striped">

                                <tr>

                                    <th>S/N</th>
                                    <th>Date Of Review</th>
                                    <th>Rank</th>
                                    <th>Nomenclature Category</th>
                                    <th>Nomenclature Group</th>
                                    <th>Nomenclature Rank</th>

                                    <th>Salary</th>
                                    <th>Status</th>

                                </tr>
                                @foreach($contacts as $key => $value)
                                    <tr>

                                        <td>{{ ++$key}}</td>
                                        <td>{{ date("jS F, Y", strtotime($value->date_of_review)) }}</td>
                                        <td>{{ $value->rank->rank }}</td>
                                        <td>{{ $value->nomenclature()->name ?? 'null'}}</td>
                                        <td>{{ $value->nomenclatureGroup()->name ?? 'null'}}</td>
                                        <td>{{ $value->nomenclatureRank()->name ?? 'null'}}</td>
                                        <td>₦ {{ number_format($value->salary, 2) }}</td>
                                        <td>
                                            @if ($value->status =='COMPLETED')
                                                <a class="btn btn-sm btn-success"> {{$value->status}}</a>
                                            @else
                                                <a class="btn  btn-sm btn-warning"> {{$value->status}}</a>
                                            @endif
                                        </td>

                                    </tr>
                                @endforeach
                            </table>
                        </div>
                    </div>
{{--    <table class="table table-bordered">--}}
{{--        <tr>--}}

{{--            <th>Date Of Review</th>--}}
{{--            <th>Rank</th>--}}
{{--            <th>Salary</th>--}}
{{--        </tr>--}}
{{--        @foreach($contacts as $key => $value)--}}
{{--            <tr>--}}

{{--                <td>{{ $value->date_of_review }}</td>--}}
{{--                <td>{{ $value->rank }}</td>--}}
{{--                <td>{{ $value->salary }}</td>--}}
{{--            </tr>--}}
{{--        @endforeach--}}
{{--    </table>--}}

{{--    <form>--}}
{{--        <div class=" add-input">--}}
{{--            <div class="row">--}}
{{--                <div class="col-md-3">--}}
{{--                    <div class="form-group">--}}
{{--                        <input type="date" class="form-control" placeholder="Enter Review Date" wire:model="date_of_review.0">--}}
{{--                        @error('date_of_review.0') <span class="text-danger error">{{ $message }}</span>@enderror--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="col-md-3">--}}
{{--                    <div class="form-group">--}}
{{--                        <input type="text" class="form-control" wire:model="rank.0" placeholder="Enter Rank">--}}
{{--                        @error('rank.0') <span class="text-danger error">{{ $message }}</span>@enderror--}}
{{--                    </div>--}}
{{--                </div>--}}

{{--                <div class="col-md-3">--}}
{{--                    <div class="form-group">--}}
{{--                        <input type="number" class="form-control" wire:model="salary.0" placeholder="Enter Salary">--}}
{{--                        @error('salary.0') <span class="text-danger error">{{ $message }}</span>@enderror--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="col-md-2">--}}
{{--                    <button class="btn text-white btn-info btn-sm" wire:click.prevent="add({{$i}})">Add</button>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}

{{--        @foreach($inputs as $key => $value)--}}
{{--            <p></p>--}}
{{--            <div class=" add-input">--}}
{{--                <div class="row">--}}
{{--                    <div class="col-md-3">--}}
{{--                        <div class="form-group">--}}
{{--                            <input type="date" class="form-control" placeholder="Enter Review Date" wire:model="date_of_review.{{ $value }}">--}}
{{--                            @error('date_of_review.'.$value) <span class="text-danger error">{{ $message }}</span>@enderror--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="col-md-3">--}}
{{--                        <div class="form-group">--}}
{{--                            <input type="text" class="form-control" wire:model="rank.{{ $value }}" placeholder="Enter Rank">--}}
{{--                            @error('rank.'.$value) <span class="text-danger error">{{ $message }}</span>@enderror--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="col-md-3">--}}
{{--                        <div class="form-group">--}}
{{--                            <input type="number" class="form-control" wire:model="salary.{{ $value }}" placeholder="Enter Salary">--}}
{{--                            @error('salary.'.$value) <span class="text-danger error">{{ $message }}</span>@enderror--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="col-md-2">--}}
{{--                        <button class="btn btn-danger btn-sm" wire:click.prevent="remove({{$key}})">Remove</button>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        @endforeach--}}
{{--<p></p>--}}
{{--        <div class="row">--}}
{{--            <div class="col-md-12">--}}
{{--                <button type="button" wire:click.prevent="store()" class="btn btn-success btn-sm">Submit</button>--}}
{{--            </div>--}}
{{--        </div>--}}

{{--    </form>--}}
        </div>
    </div>
</div>
