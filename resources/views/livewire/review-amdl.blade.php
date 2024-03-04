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
                            <th>Nomenclature Number</th>

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
                                <td>{{ $value->nomenclature_number ?? 'null'}}</td>
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
        </div>
    </div>

</div>
