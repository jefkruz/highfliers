<div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">



                    <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100">
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
                                <td>{{$user->score}}</td>


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
