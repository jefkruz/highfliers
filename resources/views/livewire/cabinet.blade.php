<div>
    {{-- Because she competes with no one, no one can compete with her. --}}
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Cabinet') }}
                            </span>

                            <div class="float-right">
                                <a href="{{ route('cabinets.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
                    <form class="app-search d-none d-lg-block" method="POST" action="{{ route('documents.search') }}"  role="form" enctype="multipart/form-data">
                        @csrf
                        <div class="position-relative">
                            <input type="text" name="search" wire:model="search" class="form-control" placeholder="Search...">
                            <span class="bx bx-search-alt"></span>
                        </div>
                    </form>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                <tr>
                                    <th>No</th>

                                    <th>Organization </th>
                                    <th>Name</th>

                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($cabinets as $cabinet)
                                    <tr>
                                        <td>{{ ++$i }}</td>

                                        <td>{{ $cabinet->organization->name }}</td>
                                        <td>{{ $cabinet->name }}</td>

                                        <td>
                                            <form action="{{ route('cabinets.destroy',$cabinet->id) }}" method="POST">
                                                <a class="btn btn-sm btn-primary " href="{{ route('cabinets.show',$cabinet->id) }}"><i class="fa fa-fw fa-eye"></i> Show</a>
                                                <a class="btn btn-sm btn-success" href="{{ route('cabinets.edit',$cabinet->id) }}"><i class="fa fa-fw fa-edit"></i> Edit</a>
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> Delete</button>

                                                <a class="btn btn-sm btn-warning" href="/drawersIndex/{{Crypt::encrypt($cabinet->id) }}"><i class="fa fa-fw fa-edit"></i> Drawers</a>
                                                <a class="btn btn-sm btn-primary" href="" data-bs-toggle="modal"
                                                   data-bs-target=".update-profile1" wire:click="create({{ $cabinet->id }})"><i class="fa fa-fw fa-user"></i> Add User</a>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $cabinets->links() !!}
            </div>
        </div>
    </div>
    <div wire:ignore.self class="modal fade update-profile1" tabindex="-1" role="dialog"
         aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="myLargeModalLabel">Users</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" method="POST" enctype="multipart/form-data" id="update-profile">
                        @csrf
                        <input type="hidden" value="{{ Auth::user()->id }}" id="data_id">
                        @foreach ($users as $user)
                        <div class="mb-3">
                            <label for="useremail" class="form-label">{{$user->name}}</label>
                            <input class="form-check-input" wire:model="user_id" type="checkbox" value="{{$user->id}}" id="flexCheckDefault">
                        </div>
                            @endforeach




                        <div class="mt-3 d-grid">
                            <button class="btn btn-primary waves-effect waves-light UpdateProfile" data-id="{{ Auth::user()->id }}"
                                    type="submit"  wire:click.prevent="update()" data-bs-dismiss="modal" >Update</button>
                        </div>
                    </form>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div>
</div>
