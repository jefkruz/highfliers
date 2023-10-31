

<div class="">
    <div class="row">

        <div class="col-md-12">
            <div class="form-group">
                <label for="">Full Name</label>
                <input type="text" class="form-control" value="{{old('name')}}" placeholder="Full Name" name="name">
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <label for="">KingsChat Username</label>
                <input type="text" class="form-control" value="{{old('username')}}" placeholder="KingsChat Username" name="username">
            </div>
        </div>

        <div class="col-md-12">
            <div class="form-group">
                <label for="">Recruitment Company</label>
                <select name="company" id="company" class="form-control" required>
                    <option value="">Recruitment Company</option>
                    <option value="msnc">MSNC</option>
                    <option value="amdl">AMDL</option>
                </select>
            </div>
        </div>

        <div id="organization_id" class="col-md-12" style="display: none">
            <div class="form-group">
                <label for="">AMDL Organizations</label>
                <select name="organization_id" class="form-control">
                    <option value="">--Select Organization--</option>
                    @foreach($organization as $org)
                        <option value="{{$org->id}}">{{$org->name}}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div id="station" class="col-md-12" style="display: none">
            <div class="form-group">
                <label for="">MSNC Stations</label>
                <select name="station_id" id="station_id" class="form-control">
                    <option value="">--Select Station--</option>
                    @foreach($station as $stat)
                        <option value="{{$stat->stationId}}">{{$stat->stationName}}</option>
                    @endforeach
                </select>
            </div>
        </div>


        <div id="departmentList" class="col-md-12" style="display: none">
            <div class="form-group">
                <label for="">MSNC Departments</label>
                <select name="department_id" id="department_id" class="form-control">
                    <option value="">--Select Department--</option>

                </select>
            </div>
        </div>

        <div class="col-md-12">
            <label for="">Role</label>
            <select name="role_id" class="form-control " >
                @if(!empty($user->role_id))
                    <option value="{{$user->role_id}}">{{$user->role()->display_name}}</option>
                    @foreach($roles as $role)

                        <option value="{{$role->id}}">{{$role->display_name}}</option>

                    @endforeach
                @else
                    @foreach($roles as $role)

                        <option value="{{$role->id}}">{{$role->display_name}}</option>

                    @endforeach
                @endif
            </select>

        </div>


    </div>
    <div class="box-footer mt-2">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>

@section('script')
    <script>

        const organization = $('#organization_id');
        const station = $('#station');
        const department = $('#departmentList');

        $('#company').on('change', function(){
            const val = $(this).val();
            if(val === 'amdl'){
                organization.show(500);
                station.hide(500);
                department.hide(500);
            } else {
                station.show(500);
                department.show(500);
                organization.hide(500);
            }

        });

        $('#station_id').change(function() {
            var selectedStationId = $(this).val();

            // Make an AJAX request to fetch departments for the selected station
            $.ajax({
                method: 'GET',
                url: "/admin/admins/fetchDepartments/" + selectedStationId,
                {{--url: "{{ route('fetchDepartments', '') }}/" + selectedStationId,--}}

                // url: 'fetchDepartments/' + selectedStationId, // Replace this with the actual route for getting departments
                success: function(data) {
                    var departmentSelect = $('#department_id');
                    departmentSelect.empty().append('<option value="">--Select Department--</option>');

                    if (data && data.departments) {
                        $.each(data.departments, function(index, department) {
                            departmentSelect.append($('<option></option>').attr('value', department.id).text(department.deptName));
                        });

                        // Show the department list after populating departments
                        $('#departmentList').show();
                    }
                },
                error: function() {
                    // Handle error if unable to fetch departments
                }
            });
        });


    </script>
@endsection
