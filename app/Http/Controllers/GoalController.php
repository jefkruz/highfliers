<?php

namespace App\Http\Controllers;

use App\Goal;
use App\Models\Organization;
use App\Models\SubDepartment;
use App\Models\SubDepStaff;
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
        $year = decrypt($id1);
        $sub = decrypt($id2);
        $yearly = YearlyGoals::find($year);
        $sub = SubDepartment::find($sub);
        $staffs = SubDepStaff::where('sub_dept_id', $sub->id)->where('dept_id',$sub->department_id)->get();

        return view('goals.monthly',compact('yearly','sub','staffs' ));
    }



}
