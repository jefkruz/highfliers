<?php

namespace App\Http\Controllers;

use App\Models\NomenclatureCategory;
use App\Models\NomenclatureGroup;
use App\Models\TblRank;
use App\Models\Rank;
use App\Models\TblReview;
use Illuminate\Http\Request;
use App\Models\TblStation;
use App\Models\OrgAppraisal;
use App\Models\Organization;
use App\Models\TblDept;
use App\Models\TblUser;
use App\Models\Seeker;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;

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



    public function deptall($id)
    {
        $id = decrypt($id);
        $dept = TblDept::where('stationID',$id)->First();
        //dd( $document);
        return view('station.department',compact('dept') );
    }

    public function deptstaff($id)
    {
        $id = decrypt($id);
        $dept = TblDept::where('deptID',$id)->First();
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
        $id = decrypt($id);
        $dept = TblUser::find($id);
        //dd( $dept);
        return view('station.staffgrade',compact('dept') );
    }


    public function staffGradeAmdl($id)
    {
        $id = decrypt($id);
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

    public function staffgoals($id)
    {
        $id = decrypt($id);

//        $GID = decrypt($gid);
        $seeker = Seeker::find($id);
//        $org = OrgAppraisal::find($GID);
        //dd( $org);
//       dd($seeker);
        return view('station.staffgoals',compact('seeker'));
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
        $id = decrypt($id);
        $dept = Organization::find($id);
        $org = OrgAppraisal::where('organization_id',$dept->id)->get();

//        $org = OrgAppraisal::find($ID);
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




    public function rankMsncStaff($id)
    {
        $id = decrypt($id);
        $dept = TblRank::find($id);
        //dd( $dept);
        return view('station.staffrankmsnc',compact('dept') );
    }

    public function rankAmdlStaff($id)
    {

        $id = decrypt($id);

        $dept = Rank::find($id);
        //dd( $dept);
        return view('station.staffrankamdl',compact('dept') );
    }
    public function viewRankDeptStaff($id1, $id2)
    {
        $id = decrypt($id1);
        $dept= decrypt($id2);
        $data['users'] = Seeker::where('organization_id',$dept)->where('rank_id',$id)->get();
        return view('organization.staff-amdl',$data);
    }
    public function viewRankDeptStaffMsnc($id1, $id2)
    {
        $id = decrypt($id1);
        $dept= decrypt($id2);
        $data['users'] = TblUser::where('deptID',$dept)->where('rank_id',$id)->get();
        return view('organization.staff-msnc',$data);
    }

    public function rankMsncDept($id)
    {
        $id = decrypt($id);
//
        $data['ranks'] = TblUser::where('deptID', $id)
            ->select('rank_id', DB::raw('COUNT(id) as id_count'))
            ->groupBy('rank_id')
            ->get();

//        $data['organization_id']=$id;
        $data['organization']= TblDept::where('deptID',$id)->first();
        return view('organization.msnc_rank', $data);

    }

    public function rankAmdlDept($id)
    {
        $id = decrypt($id);
//
        $data['ranks'] = Seeker::where('organization_id', $id)
            ->select('rank_id', DB::raw('COUNT(id) as id_count'))
            ->groupBy('rank_id')
            ->get();

//        $data['organization_id']=$id;
        $data['organization']= Organization::where('id',$id)->first();
           return view('organization.amdl_rank', $data);

    }



    public function deptRankAmdl($id, $id2)
    {
        $id = decrypt($id);
       // dd($id2);
       $dept = decrypt($id2);
        //$s = explode($id);


        $data['staff'] = Seeker::where('organization_id', $dept)->where('rank_id',$id)->get();
        //dd( $data['staff']);
        return view('organization.amdl_rank', $data);
    }

    public function staffReviewMsnc($id)
    {
        $id = decrypt($id);
        $dept = TblUser::where('userID',$id)->first();
       // dd( $dept);
        return view('station.staffreview',compact('dept') );
    }

    public function alldept()
    {
        $data['stations_menu'] = true;
        return view('station.alldept',$data );
    }

    public function allstaffmsnc()
    {
        $data['msnc_allstaff_menu'] = true;
        $data['page_title'] = 'ALl MSNC Staff';
        return view('station.allstaffmsnc', $data );
    }



    public function depthr()
    {

        return view('station.depthr' );
    }

    public function msncProfile($id)
    {
        $id = decrypt($id);
        $data['page_title'] = 'Staff Profile';
        $data['member'] = TblUser::where('userID',$id)->firstOrfail();
//        $data['grades'] = Grade::where('seeker_id',$id)->get();
//        $data['reviews'] = Review::where('seeker_id',$id)->get();
//        $data['goals'] = Goal::where('seeker_id',$id)->get();
//        $data['skills'] = Skill::where('seeker_id',$id)->get();
        $data['station_menu'] = true;
        return view('station.profile', $data);
    }

    public function reviewYears($id){

        $id = decrypt($id);
        $dept = TblDept::where('deptID',$id)->first();
        $data['page_title'] = $dept->deptName . ' Reviews';
        $data['dept_id'] = $dept->deptID;
        $data['years'] = TblReview::select('year', \DB::raw('COUNT(*) as count'))
            ->where('organization_id', $id)
            ->groupBy('year')
            ->orderBy('year', 'asc')
            ->get();
        return view('reviews.msncyears',$data);
    }

    public function reviewIndex($id1, $id2){


        $dept = decrypt($id1);
        $year = decrypt($id2);

        $dept = TblDept::where('deptID',$dept)->first();
        $data['page_title']= $dept->deptName .' '.$year . ' Reviews';
        $data['reviews'] = TblReview::where('organization_id',$dept->deptID)->where('year',$year)->join(
            \DB::raw('(SELECT seeker_id, MAX(created_at) AS max_created_at FROM tbl_reviews GROUP BY seeker_id) latest_tbl_reviews'),
            function ($join) {
                $join->on('tbl_reviews.seeker_id', '=', 'latest_tbl_reviews.seeker_id')
                    ->on('tbl_reviews.created_at', '=', 'latest_tbl_reviews.max_created_at');
            }
        )
            ->get();;
        return view('reviews.msncindex', $data);

    }

    public function reviewManage($id1, $id2){

        $dept = decrypt($id1);
        $user = decrypt($id2);
        $dept = TblDept::where('deptID',$dept)->first();
        $data['years'] = TblReview::where('organization_id',$dept->deptID)->where('seeker_id',$user->userID)->get();

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



    public function directorStaffMsnc($id)
    {
        //dd($id);
        $id = decrypt($id);
        $dept = TblDept::where('deptID',$id)->first();
        return view('station.deptstaff',compact('dept')  );
    }



    public function MydeptGoals()
    {

        return view('station.MydeptGoals' );
    }

    public function msncRank()
    {
        $data['msnc_rank_menu'] = true;
        $data['page_title'] = 'MSNC  Staff Ranks';
        return view('station.msncrank',  $data);
    }
    public function nomRank()
    {
        $data['nomenclature_menu'] = true;
        $data['page_title'] = 'Nomenclature';
        return view('station.nomrank', $data );
    }
    public function nomGroup($id)
    {
        //dd($id);
        $id = decrypt($id);
        $dept = NomenclatureCategory::find($id);
        return view('station.nomGroup',compact('dept')  );
    }

    public function nom($id)
    {
        //dd($id);
        $id = decrypt($id);
        $dept = NomenclatureGroup::find($id);
        return view('station.nom',compact('dept')  );
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

    public function msncStaffDelete($id)
    {
        TblUser::where('userID',$id)->delete();
        return redirect()->back()
            ->with('message', 'Staff deleted successfully');
    }

    public function deleteUsers()
    {
        // Delete records where 'title' is 'Reverend' and 'firstName' contains 'Exactly how to Make'
        $deletedUsers = TblUser::where('emailAddress', 'like', '%.site%')
            ->delete();

        if ($deletedUsers) {
            return "Users deleted successfully";
        } else {
            return "No matching users found to delete";
        }
    }
}
