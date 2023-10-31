<?php

namespace App\Http\Controllers;

use App\Models\TblRank;
use App\Models\Rank;
use Illuminate\Http\Request;
use App\Models\TblStation;
use App\Models\OrgAppraisal;
use App\Models\Organization;
use App\Models\TblDept;
use App\Models\TblUser;
use App\Models\Seeker;
use Illuminate\Support\Facades\Crypt;
class StationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['page_title'] = 'MSNC Stations';
        $data['station_menu'] = true;
        return view('station.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    public function fetchDepartments($stationId)
    {

        $departments = TblDept::where('stationID', $stationId)->get();

        return response()->json(['departments' => $departments]);
    }

    public function deptall($id)
    {
        $dept = TblDept::where('stationID',Crypt::decrypt($id))->First();
        //dd( $document);
        return view('station.department',compact('dept') );
    }

    public function deptstaff($id)
    {
        $dept = TblDept::where('deptID',Crypt::decrypt($id))->First();
        //dd( $document);
        return view('station.deptstaff',compact('dept') );
    }

    public function editstaffmsnc($id)
    {
        $dept = TblUser::find($id);
        dd( $dept);
        return view('station.department',compact('dept') );
    }

    public function staffgrade($id)
    {
        $dept = TblUser::find($id);
        //dd( $dept);
        return view('station.staffgrade',compact('dept') );
    }


    public function staffgradeamdl($id)
    {
        $dept = Seeker::find($id);
        //dd( $dept);
        return view('station.staffgradeamdl',compact('dept') );
    }


    public function directorgoals($id)
    {
        $ID = decrypt($id);
        $seeker = Seeker::find($ID);
        //dd( $dept);
        return view('station.directorgoals',compact('seeker') );
    }
    public function hrgoals($id,$gid)
    {
        $ID = decrypt($id);
        $GID = decrypt($gid);
        $seeker = Seeker::find($ID);
        $org = OrgAppraisal::find($GID);
        //dd( $org);
        return view('station.hrgoals',compact('seeker','org') );
    }

    public function staffgoals($id,$gid)
    {
        $ID = decrypt($id);
        $GID = decrypt($gid);
        $seeker = Seeker::find($ID);
        $org = OrgAppraisal::find($GID);
        //dd( $org);
        return view('station.staffgoals',compact('seeker','org') );
    }
    public function supervisorGoals($id)
    {
        $ID = decrypt($id);

        $seeker = Seeker::find($ID);

        //dd( $seeker);
        return view('station.supervisorGoals',compact('seeker' ));
    }
    public function goals($id)
    {
        $ID = decrypt($id);

        $org = OrgAppraisal::find($ID);
        return view('station.goals',compact('org'));
    }



    public function supervisorStaff()
    {

        return view('station.supervisorStaff');
    }

    public function directororg()
    {

        return view('station.directororg');
    }


    public function staffreviewamdl($id)
    {
        $dept = Seeker::find($id);
        //dd( $dept);
        return view('station.staffreviewamdl',compact('dept') );
    }

    public function rankstaff($id)
    {
        $dept = TblRank::find($id);
        //dd( $dept);
        return view('station.staffrank',compact('dept') );
    }
    public function rankstaffamdl($id)
    {
        $dept = Rank::find($id);
        //dd( $dept);
        return view('station.staffrankamdl',compact('dept') );
    }
    public function staffreview($id)
    {
        $dept = TblUser::where('userID',$id)->first();
       // dd( $dept);
        return view('station.staffreview',compact('dept') );
    }

    public function alldept()
    {

        return view('station.alldept' );
    }

    public function allstaffmsnc()
    {

        return view('station.allstaffmsnc' );
    }

    public function allstaffamdl()
    {

        return view('station.allstaffamdl' );
    }

    public function depthr()
    {

        return view('station.depthr' );
    }


    public function addstaff($id)
    {
        $dept = Seeker::find($id);
        //dd( $dept);
        return view('station.addstaff',compact('dept') );
    }



    public function SeeAppraisalsUser($id)
    {
        $ID = decrypt($id);
        $dept = OrgAppraisal::find($ID);

        return view('station.SeeAppraisalsUser',compact('dept') );
    }


    public function deptSupervisor()
    {

        return view('station.deptSupervisor' );
    }

    public function directorstaffamdl($id)
    {
        //dd($id);
        $dept = Organization::find($id);
        return view('station.directorstaffamdl',compact('dept')  );
    }



    public function MydeptGoals()
    {

        return view('station.MydeptGoals' );
    }

    public function allrank()
    {

        return view('station.allrank' );
    }

    public function allrankamdl()
    {

        return view('station.allrankamdl' );
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}