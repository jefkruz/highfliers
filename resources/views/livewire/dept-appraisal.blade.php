<div>
    @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif

    <table class="table table-bordered">
        <tr>

            <th>YEAR</th>
            <th>MONTH</th>
            <th>ACTION</th>

        </tr>
        @foreach($contacts as $key => $value)
            <tr>

                <td>{{ $value->year }}</td>
                <td>{{ date('F', mktime(0, 0, 0, $value->month, 1))}}</td>
                <td>    <a href="/SeeAppraisalsUser/{{encrypt($value->id)}}"> <button    class="btn btn-info btn-sm">See</button></a></td>

            </tr>
        @endforeach
    </table>
 @can('isHr')
    <form>
        <div class=" add-input">
            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        <select  class="form-control" wire:model="year.0">
                            <option value="" >Select Year</option>
                            @for ($year = date('Y') + 0; $year < date('Y') + 100; $year++)
                                <option value="{{$year}}" >{{$year}}</option>
                            @endfor
                        </select>
                        @error('year.0') <span class="text-danger error">{{ $message }}</span>@enderror
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <select class="form-control" wire:model="month.0">
                            <option value="" >Select Month</option>
                        @foreach (range(1, 12) as $m)
                                <option value="{{date('m', mktime(0, 0, 0, $m, 1))}}" >{{date('F', mktime(0, 0, 0, $m, 1))}}</option>
                        @endforeach
                        </select>
                        @error('month.0') <span class="text-danger error">{{ $message }}</span>@enderror
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
                            <select class="form-control" wire:model="year.{{ $value }}">

                                <option value="" >Select Year</option>
                                @for ($year = date('Y') + 0; $year < date('Y') + 100; $year++)
                                    <option value="{{$year}}" >{{$year}}</option>
                                @endfor
                            </select>
                            @error('year.'. $value ) <span class="text-danger error">{{ $message }}</span>@enderror
                     </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <select class="form-control" wire:model="month.{{ $value }}">
                                <option value="" >Select Month</option>
                                @foreach (range(1, 12) as $m)
                                    <option value="{{date('m', mktime(0, 0, 0, $m, 1))}}" >{{date('F', mktime(0, 0, 0, $m, 1))}}</option>
                                @endforeach
                            </select>
                            @error('month.'.$value) <span class="text-danger error">{{ $message }}</span>@enderror
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
      @endcan
</div>
