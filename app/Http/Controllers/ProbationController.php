<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Organization;
use App\Models\ProbationStaff;
use App\Models\SubDepartment;
use App\Models\TblDept;
use App\Models\TblProbationStaff;
use App\Models\Unit;
use Illuminate\Http\Request;

class ProbationController extends Controller
{
    //

    public function probationIndex($id)
    {
       $id = decrypt($id);
       $data['staff'] = ProbationStaff::where('department_id',$id)->count();
        $data['department_id'] = $id;
        $data['hrs'] = Admin::where('organization_id', $id)->where('role_id',7)->count();
        $data['supervisors'] = Admin::where('organization_id', $id)->where('role_id',9)->count();
        $data['amdlunits'] = SubDepartment::where('department_id',$id)->count();
        return view('probation.amdl_menu', $data);
    }

    public function probationStaffAmdl($id)
    {
        $id = decrypt($id);
        $dept = Organization::find($id);

        return view('probation.amdl_staff', compact('dept'));
    }

    public function probationStaffMsnc($id)
    {
        $id = decrypt($id);
        $dept = TblDept::where('deptID',$id)->first();

        return view('probation.msnc_staff', compact('dept'));
    }

    public function msncProbationIndex($id)
    {
        $id = decrypt($id);
        $data['staff'] = TblProbationStaff::where('station_id',$id)->count();
        $data['station_id'] = $id;
        $data['hrs'] = Admin::where('station_id', $id)->where('role_id',7)->get();
        $data['supervisors'] = Admin::where('station_id', $id)->where('role_id',9)->get();
        $data['msncunits'] = SubDepartment::where('department_id',$id)->count();
        return view('probation.msnc_menu', $data);
    }
}
