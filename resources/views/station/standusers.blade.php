@extends('layouts.admin')
@section('content')

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <h4 class="card-title">Manifest</h4>

                    <a class="nav-link" href="{{url('/tblexportStandUsers/xls/'.$slug)}}">
                        <button type="button" class="mb-1 mt-1 me-1 btn btn-dark"> Download Manifest</button>
                    </a>
                    <div class="table-rep-plugin">
                        <div class="table-responsive mb-0" data-pattern="priority-columns">
                            <table id="tech-companies-1" class="table table-striped">
                                <thead>
                                <tr>
                                    <th>Company</th>
                                    <th data-priority="1">TITLE</th>
                                    <th data-priority="3">SURNAME</th>
                                    <th data-priority="1">Account Number</th>
                                    <th data-priority="3">Bank</th>
                                    <th data-priority="3">TOTAL MONTHLY</th>
                                    <th data-priority="6">MSNC/PSC</th>
                                    <th data-priority="6">Reimbursable Payment</th>
                                    <th data-priority="6">10% employer Contribution on MSNC</th>
                                    <th data-priority="6">10% employer Contribution on Reimbursable</th>
                                    <th data-priority="6">Service Charge</th>
                                    <th data-priority="6">Govt Tax Admin</th>
                                    <th data-priority="6">Comment</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($users as $user)

                                    <tr>

                                        <td>{{$user->user->title}} </td>
                                        <td>{{$user->user->firstName}} </td>
                                        <td>{{$user->user->lastName}} </td>

                                        <td>{{$user->account_number}} </td>
                                        <td>{{$user->bank}} </td>
                                        <td>{{$user->total_monthly}} </td>
                                        <td>{{$user->msnc_psc}} </td>
                                        <td>{{$user->reimbursable}} </td>
                                        <td>{{$user->contribution_msnc}} </td>
                                        <td>{{$user->contribution_reimbursable}} </td>
                                        <td>{{$user->service_charge}} </td>
                                        <td>{{$user->govt_tax_admin}} </td>
                                        <td>{{$user->comment}} </td>

                                    </tr>
                                @endforeach

                                </tbody>
                            </table>
                        </div>

                    </div>

                </div>
            </div>
        </div> <!-- end col -->
    </div>

{{ $users->links() }}
@endsection
