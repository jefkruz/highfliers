<?php

namespace App\Http\Controllers;

use App\Goal;
use App\Models\Organization;
use App\Models\Seeker;
use App\Models\SubDepartment;
use App\Models\SubDepStaff;
use App\Models\TblDept;
use App\Models\TblUser;
use App\Models\YearlyGoals;
use Illuminate\Http\Request;

/**
 * Class GoalController
 * @package App\Http\Controllers
 */
class GoalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function yearlyIndex($id1, $id2)
    {
        $subdept = decrypt($id1);
        $dept = decrypt($id2);
        $dept = Organization::find($dept);
        $sub = SubDepartment::find($subdept);

        return view('goals.yearly',compact('dept','sub') );
    }

    public function monthlyIndex($id1, $id2)
    {
        $dept = decrypt($id1);
        $user = decrypt($id2);

        $dept = Organization::find($dept);
        $user = Seeker::find($user);
        $staff = SubDepStaff::where('user_id',$user->id)->where('dept_id',$dept->id)->first();

        return view('goals.monthly',compact('dept','staff' ));
    }
    public function msncMonthlyIndex($id1, $id2)
    {
        $dept = decrypt($id1);
        $user = decrypt($id2);

        $dept = TblDept::where('deptID',$dept)->first();
        $user = TblUser::where('userID',$user)->first();
        $staff = SubDepStaff::where('user_id',$user->userID)->where('dept_id',$dept->deptID)->first();

        return view('goals.monthly',compact('dept','staff' ));
    }



}
