<div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body table-responsive" >

                    <form >
                        <div class="input-group">
                            <input type="text" wire:model="search" class="form-control form-control-lg" placeholder="Search...">

                        </div>
                    </form>

                    @if (session()->has('message'))
                        <div class="alert alert-success">
                            {{ session('message') }}
                        </div>
                    @endif
                    <br>
                    @if(session('role') == 'sdm' && $subDeptMode)
                       @include('livewire.updatestaffSubdept')
                        @endif

                    @if($updateMode)
                       @include('livewire.updatestaffmsnc')
                    @else
                       @include('livewire.createstaffmsnc')
                    @endif

<br>
<table id="datatable" class="table table-bordered dt-responsive  nowrap w-100">
   <thead>
   <tr>
       <th>First Name</th>
       <th>Last Name</th>
       <th>Rank</th>
       <th>Nomenclature Category</th>
       <th>Nomenclature Group</th>
       <th>Nomenclature Rank</th>

       <th>Department</th>
{{--                            <th>Status</th>--}}
       <th>Action</th>

   </tr>
   </thead>


   <tbody>
   @foreach ($users as $user)
       @if($user->enabled==1)
   <tr>
       <td>{{$user->firstName}}</td>
       <td>{{$user->lastName}}</td>
       <td>{{$user->level->rank?? ''}}</td>
       <td>{{$user->nomenclature()->name?? 'null'}}</td>
       <td>{{$user->nomenclatureGroup()->name?? 'null'}}</td>
       <td>{{$user->nomenclatureRank()->name?? 'null'}}</td>

       <td>{{$user->tblDept->deptName?? 'null'}}</td>
{{--                            <td>--}}
{{--                                @if($user->enabled==0)--}}
{{--                                    <button  class="btn btn-danger btn-sm">Disengaged</button>--}}
{{--                                @else--}}
{{--                                    <button  class="btn btn-success btn-sm">Active</button>--}}
{{--                                @endif--}}
{{--                            </td>--}}
       <td class="d-flex flex-row">


           <a href="{{route('msncProfile',encrypt($user->userID))}}"> <button   class="btn btn-primary"><i class="fa fa-user"></i> View Profile</button></a>

{{--           <button  wire:click="edit({{ $user->userID}})"   class="btn btn-success btn-sm m-1"><i class="fa fa-edit"></i> Edit Profile</button>--}}
{{--           <button  wire:click="subDept({{ $user->userID }})"   class="btn btn-warning btn-sm m-1"> <i class="fa fa-edit"></i> Assign SubDept</button>--}}

       @if(session('role')== 'director' || session('role')== 'admin' )
{{--           <a href="{{route('msncGrade',encrypt($user->userID))}}"> <button    class="btn btn-info btn-sm m-1"><i class="fa fa-star"></i>Grade</button></a>--}}
           <a href="{{route('staffReviewMsnc', encrypt($user->userID))}}"> <button    class="btn btn-danger  m-1"><i class="fa fa-magnifying-glass"></i> Review</button></a>
{{--                                 <button  class="btn btn-danger btn-sm" wire:click="delete({{$user->id}})"onsubmit="return confirm('Are You sure you want to delete')"  ><i class="fa fa-fw fa-trash"></i> Delete</button>--}}
           @endif
           @if($user->enabled==1)
               <button wire:click="ban({{ $user->userID }})" class="btn btn-dark btn-sm"><i class="fa fa-ban"></i> Disengage</button>
{{--                                @else--}}
{{--                                    <button wire:click="ban({{ $user->userID }})" class="btn btn-success btn-sm">Activate</button>--}}
           @endif
{{--
<form action="{{ route('msncStaffDelete',$user->userID) }}" method="POST"--}}
{{--                                    --}}{{--                                      onsubmit="return confirm('Are You sure you want to delete')"--}}
{{--                                >--}}
{{--                                   @csrf--}}
{{--                                    @method('DELETE')--}}
{{--                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> Delete</button>--}}
{{--                                </form>--}}
{{--                                <button wire:click="delete({{ $user->userID }})" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i>Delete</button>--}}
       </td>
   </tr>
       @endif
   @endforeach
   </tbody>
</table>

</div>
</div>
</div> <!-- end col -->
</div> <!-- end row -->

<div id="myModal" class="modal fade" tabindex="-1" wire:model="showLikeModal" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">

<div class="col-xl-12">
<div class="card">
   <div class="card-body">
       <h4 class="card-title mb-4">Info</h4>

       <form>
           <div class="row mb-4">
               <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">First Name</label>
               <div class="col-sm-9">
                   <input type="text" class="form-control" wire:model="firstName">
                   @error('firstName') <span class="text-danger">{{ $message }}</span>@enderror
               </div>
           </div>

           <div class="row mb-4">
               <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Other Name</label>
               <div class="col-sm-9">
                   <input type="text" class="form-control" id="horizontal-firstname-input">
               </div>
           </div>


           <div class="row mb-4">
               <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Last Name</label>
               <div class="col-sm-9">
                   <input type="text" class="form-control" id="horizontal-firstname-input">
               </div>
           </div>
           <div class="row mb-4">
               <label for="horizontal-email-input" class="col-sm-3 col-form-label">Email</label>
               <div class="col-sm-9">
                   <input type="email" class="form-control" id="horizontal-email-input">
               </div>
           </div>


           <div class="row justify-content-end">
               <div class="col-sm-9">



                   <div>
                       <button type="submit" class="btn btn-primary w-md">Submit</button>
                   </div>
               </div>
           </div>
       </form>
   </div>
   <!-- end card body -->
</div>
<!-- end card -->
</div>
<!-- end col -->
</div>
<div class="modal-footer">
<button type="button" class="btn btn-secondary waves-effect" data-bs-dismiss="modal">Close</button>
<button type="button" class="btn btn-primary waves-effect waves-light">Save changes</button>
</div>
</div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
</div><!-- /.modal -->
</div> <!-- end preview-->
</div>
