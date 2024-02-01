@extends('layouts.admin')



@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-8">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">



                             <div class="float-left">
                                <a href="{{ route('subdepartments.create', encrypt($dept->id)) }}" class="btn btn-primary btn-sm float-left"  data-placement="left">
                                  {{ __('Create New') }}
                                </a>
                              </div>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif
                    @if ($message = Session::get('error'))
                        <div class="alert alert-danger">
                            <p>{{ $error }}</p>
                        </div>
                    @endif

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>

										<th>Department </th>
										<th>Units</th>
										<th>Number of Staff</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($subDepartments as $i => $subDepartment)
                                        <tr>
                                            <td>{{ ++$i }}</td>

											<td>{{ $subDepartment->department->name }}</td>
											<td>{{ $subDepartment->name }}</td>
											<td>
                                                <a class="btn btn-sm btn-primary" href="{{route('viewAmdlSubDeptStaff',['id1' => encrypt($subDepartment->id), 'id2' => encrypt($dept->id)])}}"><i class="fa fa-fw fa-eye"></i> {{$subDepartment->staffcount()}} Staff</a>
{{--                                                <a class="btn btn-sm btn-info" href="{{route('yearlyGoals.index',['id1' => encrypt($subDepartment->id), 'id2' => encrypt($dept->id)])}}"><i class="fa fa-fw fa-edit"></i> Goals</a>--}}
                                            </td>

                                            <td>
                                                <form action="{{ route('subdepartments.destroy',$subDepartment->id) }}" method="POST">
{{--                                                    <a class="btn btn-sm btn-primary " href="{{ route('sub-departments.show',$subDepartment->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>--}}
{{--                                                    <a class="btn btn-sm btn-success" href="{{ route('sub-departments.edit',$subDepartment->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>--}}
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> {{ __('Delete') }}</button>
                                                </form>
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
