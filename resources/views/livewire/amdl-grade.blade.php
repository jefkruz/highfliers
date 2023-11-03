<div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div style="display: flex; justify-content: space-between; align-items: center;">



                        <div class="float-right">
                            <a href="{{ route('grade', encrypt($user->id)) }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                {{ __('Grade Staff') }}
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-body">



                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>Year</th>
                            <th>Grade</th>


                        </tr>
                        </thead>


                        <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td>{{$user->year}}</td>
                                <td>{{$user->grade_score}}</td>


                            </tr>

                        @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->

</div> <!-- end preview-->
</div>
