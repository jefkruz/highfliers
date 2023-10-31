@extends('layouts.admin')

@section('content')

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <h4 class="card-title">Manifest</h4>

                    <a class="nav-link" href="{{url('/exportManifestsCard/xls/'.$slug)}}">
                        <button type="button" class="mb-1 mt-1 me-1 btn btn-dark"> Download Bank Payment</button>
                    </a>
                    <div class="table-rep-plugin">
                        <div class="table-responsive mb-0" data-pattern="priority-columns">
                            <table id="tech-companies-1" class="table table-striped">
                                <thead>
                                <tr>
                                    <th style="text-transform:uppercase;">Card</th>

                                    <th style="text-transform:uppercase;">Name</th>
                                    <th  style="text-transform:uppercase;">Account number</th>
                                    <th  style="text-transform:uppercase;">Currency</th>
                                    <th  style="text-transform:uppercase;">BANK</th>
                                    <th  style="text-transform:uppercase;">Narration</th>
                                    <th  style="text-transform:uppercase;">Officer Code</th>
                                    <th  style="text-transform:uppercase;">Source Code</th>
                                    <th  style="text-transform:uppercase;">AcctMod</th>
                                    <th  style="text-transform:uppercase;">Amount</th>
                                    <th  style="text-transform:uppercase;">sectCode</th>
                                    <th  style="text-transform:uppercase;">Value Date (mm/dd/yyyy)</th>
                                    <th  style="text-transform:uppercase;">AuthID</th>
                                    <th  style="text-transform:uppercase;">Trans Code </th>
                                    <th  style="text-transform:uppercase;">Tran Date (mm/dd/yyyy) </th>


                                </tr>
                                </thead>
                                <tbody>
                                @foreach($users as $user)

                                    <tr>

                                        <td>{{$user->card}} </td>

                                        <td>{{$user->name}} </td>
                                        <td>{{$user->account_number}} </td>
                                        <td>{{$user->currency}} </td>
                                        <td>{{$user->bank}} </td>
                                        <td>{{$user->narration}} </td>
                                        <td>{{$user->officer_code}} </td>
                                        <td>{{$user->source_code}} </td>
                                        <td>{{$user->acct_mod}} </td>
                                        <td>{{$user->amount}} </td>
                                        <td>{{$user->sect_code}} </td>
                                        <td>{{$user->value_date}} </td>
                                        <td>{{$user->auth_id}} </td>
                                        <td>{{$user->trans_code}} </td>
                                        <td>{{$user->tran_date}} </td>

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
