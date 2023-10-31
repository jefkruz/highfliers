@extends('layouts.admin')

@section('content')
<div class="container" style="margin-top: 5rem;">
    @if($message = Session::get('success'))
        <div class="alert alert-info alert-dismissible fade in" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
            <strong>Success!</strong> {{ $message }}
        </div>
    @endif
    {!! Session::forget('success') !!}
    <br />
        <div>
            <div class="mx-auto pull-right">
                <div class="">
                    <form>

                        <div class="input-group">
                        <span class="input-group-btn mr-5 mt-1">
                            <button class="btn btn-info" type="submit" title="Search projects">
                                <span class="fas fa-search"> Search</span>
                            </button>
                        </span>
                            <input type="text" class="form-control mr-2" name="term" placeholder="Search projects" id="term">

                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-18">
                <div class="card">
                    <div class="card-body">


                        <div class="table-rep-plugin">
                            <div class="table-responsive mb-0" data-pattern="priority-columns">
        <table class="table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col"></th>
                <th scope="col">Total</th>

            </tr>
            </thead>
            <tbody>
            <tr>
                <th scope="row">1</th>
                <td>No. of Staff</td>
                <td>{{$users->count()}}</td>

            </tr>
            <tr>
                <th scope="row">2</th>
                <td>Total Salary</td>
                <td>{{$users->sum('total_monthly')}}</td>

            </tr>
            <tr>
                <th scope="row">3</th>
                <td>Total Government Tax Administration cost</td>

                <td>{{$users->sum('govt_tax_admin')}}</td>
            </tr>
            <tr>
                <th scope="row">4</th>
                <td>Total Service Charge</td>

                <td>{{$users->sum('service_charge')}}</td>
            </tr>
            <tr>
                <th scope="row">5</th>
                <td>Total AMD Pension Contribution</td>

                <td>{{$users->sum('contribution_msnc')}}</td>
            </tr>
            <tr>
                <th scope="row">6</th>
                <td>Total Reimbursable Pension Contribution</td>

                <td>{{$users->sum('contribution_reimbursable')}}</td>
            </tr>
            <tr>
                <th scope="row">7</th>
                <td>Total for remittance to AMD Account:</td>

                <td>{{$users->sum('contribution_msnc')+
                $users->sum('contribution_reimbursable')+
                $users->sum('contribution_msnc')+
                $users->sum('service_charge')+
                $users->sum('govt_tax_admin')+
                $users->sum('total_monthly')+
                $users->sum('total_monthly')}}</td>
            </tr>

            <tr>
                <th scope="row">8</th>
                <td>Bank Name:</td>

                <td>{{$users[0]->accountStandedManifest->bank_name?? ''}}</td>
            </tr>

            <tr>
                <th scope="row">9</th>
                <td>Account Name:</td>

                <td>{{$users[0]->accountStandedManifest->account_name?? ''}}</td>
            </tr>
            <tr>
                <th scope="row">10</th>
                <td>Account Number:</td>

                <td>{{$users[0]->accountStandedManifest->account_number?? ''}}</td>
            </tr>
            </tbody>
        </table>
                            </div>
                            </div>
                            </div>
                            </div>
                            </div>
                            </div>
        <div class="row">
            <div class="col-18">
                <div class="card">
                    <div class="card-body">


                        <div class="table-rep-plugin">
                            <div class="table-responsive mb-0" data-pattern="priority-columns">
                                <table id="tech-companies-1" class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th>TITLE</th>
                                        <th data-priority="1">FIRST NAME</th>
                                        <th data-priority="3">SURNAME</th>
                                        <th data-priority="1">Bank</th>
                                        <th data-priority="3">TOTAL MONTHLY</th>
                                        <th data-priority="3">MSNC/PSC </th>
                                        <th data-priority="6">Reimbursable Payment</th>
                                        <th data-priority="6">10% employer Contribution on MSNC</th>
                                        <th data-priority="6">10% employer Contribution on Reimbursable</th>
                                        <th data-priority="6">Service Charge</th>
                                        <th data-priority="6">Govt Tax Admin</th>
                                        <th data-priority="6">Comment</th>
                                        <th data-priority="6">action</th>
                                    </tr>
                                    </thead>
                                    <tbody>




                                    @foreach($users as $user)

                                        <tr>

                                            <td>{{$user->tblUser->title}} </td>
                                            <td>{{$user->tblUser->firstName}} </td>
                                            <td>{{$user->tblUser->lastName}} </td>

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
                                            <td><a class="nav-link" href="{{url('/tblmanifestComment/'.$user->userID)}}">
                                                    <button type="button" class="mb-1 mt-1 me-1 btn btn-danger"> Comment</button>
                                                </a>

{{--                                                <a class="nav-link" href="{{ route('manifest-organizations.edit',$user->id) }}">--}}
{{--                                                    <button type="button" class="mb-1 mt-1 me-1 btn btn-warning"> Edit </button>--}}
{{--                                                </a>--}}
                                            </td>

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
