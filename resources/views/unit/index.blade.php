@extends('layouts.admin')



@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-8">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">



                             <div class="float-left">
                                <a href="{{ route('unit.create',encrypt($dept->id)) }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Create New') }}
                                </a>
                              </div>
                        </div>
                    </div>


                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>

										<th>Department</th>
										<th>Sub Department</th>
										<th>Name</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($units as $i=> $unit)
{{--                                        @php $sub = \App\Models\SubDepartment::where('id',$unit->sub_department_id)->first() @endphp--}}
                                        <tr>
                                            <td>{{ $i++ }}</td>

											<td>{{ $unit->Organization->name }}</td>
											<td>{{ $unit->subdept->name }}</td>
											<td>{{ $unit->name }}</td>

                                            <td>
{{--                                                <form action="{{ route('unit.destroy',$unit->id) }}" method="POST">--}}
{{--                                                    <a class="btn btn-sm btn-primary " href="{{ route('unit.show',$unit->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>--}}
{{--                                                    <a class="btn btn-sm btn-success" href="{{ route('unit.edit',$unit->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>--}}
{{--                                                    @csrf--}}
{{--                                                    @method('DELETE')--}}
{{--                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> {{ __('Delete') }}</button>--}}
{{--                                                </form>--}}
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
