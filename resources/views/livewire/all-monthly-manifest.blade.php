<div>
    {{-- Close your eyes. Count to one. That is how long forever feels. --}}
    <div class="container" style="margin-top: 5rem;">
        @if ($message = Session::get('success'))
            <div class="alert alert-info alert-dismissible fade in" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                <strong>Success!</strong> {{ $message }}
            </div>
        @endif
        {!! Session::forget('success') !!}
        <form class="app-search  d-lg">
            <div class="position-relative">
                <input type="text" wire:model="search" class="form-control" placeholder="Search...">
                <span class="bx bx-search-alt"></span>
            </div>
        </form>
        @foreach ($users as $user)
            <br />

            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <h5 class="card-header bg-transparent border-bottom text-uppercase">{{ $user->name }}</h5>
                        <div class="card-body">

                            @foreach ($this->loadManifest($user->id) as $Manifest)
                                @php
                                    $month = explode('-', $Manifest->month);

                                @endphp

                                <button type="button"
                                    wire:click="loadstandUser({{ $Manifest->id }}, {{ $user->id }})"class="btn btn-primary">{{ $month[0] . ' ' . ($monthName = date('F', mktime(0, 0, 0, $month[1], 10))) }}</button>
                            @endforeach
                            @if ($showDiv == $user->id)
                                {{--                            {{dd($deptUser->count())}} --}}

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
                                                                    <td>{{ $deptUser->count() }}</td>

                                                                </tr>
                                                                <tr>
                                                                    <th scope="row">2</th>
                                                                    <td>Total Salary</td>
                                                                    <td>{{ $deptUser->sum('total_monthly') }}</td>

                                                                </tr>
                                                                <tr>
                                                                    <th scope="row">3</th>
                                                                    <td>Total Government Tax Administration cost</td>

                                                                    <td>{{ $deptUser->sum('govt_tax_admin') }}</td>
                                                                </tr>
                                                                <tr>
                                                                    <th scope="row">4</th>
                                                                    <td>Total Service Charge</td>

                                                                    <td>{{ $deptUser->sum('service_charge') }}</td>
                                                                </tr>
                                                                <tr>
                                                                    <th scope="row">5</th>
                                                                    <td>Total AMD Pension Contribution</td>

                                                                    <td>{{ $deptUser->sum('contribution_msnc') }}</td>
                                                                </tr>
                                                                <tr>
                                                                    <th scope="row">6</th>
                                                                    <td>Total Reimbursable Pension Contribution</td>

                                                                    <td>{{ $deptUser->sum('contribution_reimbursable') }}
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <th scope="row">7</th>
                                                                    <td>Total for remittance to AMD Account:</td>

                                                                    <td>{{ $deptUser->sum('contribution_msnc') +
                                                                        $deptUser->sum('contribution_reimbursable') +
                                                                        $deptUser->sum('contribution_msnc') +
                                                                        $deptUser->sum('service_charge') +
                                                                        $deptUser->sum('govt_tax_admin') +
                                                                        $deptUser->sum('total_monthly') +
                                                                        $deptUser->sum('total_monthly') }}
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <th scope="row">8</th>
                                                                    <td>Bank Name:</td>

                                                                    <td>{{ $deptUser[0]->accountStandedManifest->bank_name ?? '' }}
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <th scope="row">9</th>
                                                                    <td>Account Name:</td>

                                                                    <td>{{ $deptUser[0]->accountStandedManifest->account_name ?? '' }}
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <th scope="row">10</th>
                                                                    <td>Account Number:</td>

                                                                    <td>{{ $deptUser[0]->accountStandedManifest->account_number ?? '' }}
                                                                    </td>
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
                                                                    <th data-priority="6">10% employer Contribution on
                                                                        MSNC</th>
                                                                    <th data-priority="6">10% employer Contribution on
                                                                        Reimbursable</th>
                                                                    <th data-priority="6">Service Charge</th>
                                                                    <th data-priority="6">Govt Tax Admin</th>
                                                                    <th data-priority="6">Comment</th>
                                                                    <th data-priority="6">action</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>




                                                                @if ($deptUser != '')
                                                                    @foreach ($deptUser as $user)
                                                                        <tr>

                                                                            <td>{{ $user->seeker->title }} </td>
                                                                            <td>{{ $user->seeker->first_name }} </td>
                                                                            <td>{{ $user->seeker->last_name }} </td>

                                                                            <td>{{ $user->account_number }} </td>
                                                                            <td>{{ $user->bank }} </td>
                                                                            <td>{{ $user->total_monthly }} </td>
                                                                            <td>{{ $user->msnc_psc }} </td>
                                                                            <td>{{ $user->reimbursable }} </td>
                                                                            <td>{{ $user->contribution_msnc }} </td>
                                                                            <td>{{ $user->contribution_reimbursable }}
                                                                            </td>
                                                                            <td>{{ $user->service_charge }} </td>
                                                                            <td>{{ $user->govt_tax_admin }} </td>
                                                                            <td>{{ $user->comment }} </td>
                                                                            <td><a class="nav-link"
                                                                                    href="{{ url('/manifestComment/' . $user->seeker_id) }}">
                                                                                    <button type="button"
                                                                                        class="mb-1 mt-1 me-1 btn btn-danger">
                                                                                        Comment</button>
                                                                                </a>

                                                                                <a class="nav-link"
                                                                                    href="{{ route('manifest-organizations.edit', $user->id) }}">
                                                                                    <button type="button"
                                                                                        class="mb-1 mt-1 me-1 btn btn-warning">
                                                                                        Edit </button>
                                                                                </a>
                                                                            </td>

                                                                        </tr>
                                                                    @endforeach
                                                                @endif

                                                            </tbody>
                                                        </table>
                                                    </div>

                                                </div>

                                            </div>
                                        </div>
                                    </div> <!-- end col -->
                                </div>

                        </div>
                    </div>
                </div>
            </div>
        @endif

    </div>
</div>
</div>
<div>



    @endforeach()
</div>
</div>
<script></script>
