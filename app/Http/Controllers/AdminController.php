<?php

namespace App\Http\Controllers;

use App\Models\AdminOffice;
use App\Models\Grade;
use App\Models\Organization;
use App\Models\ProbationStaff;
use App\Models\Rank;
use App\Models\Review;
use App\Models\Role;
use App\Models\Admin;
use App\Models\Seeker;
use App\Models\SubDepartment;
use App\Models\TblDept;
use App\Models\TblProbationStaff;
use App\Models\TblRank;
use App\Models\TblReview;
use App\Models\TblStation;
use App\Models\TblUser;
use App\Models\NomenclatureCategory;

use App\Models\Unit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;


class AdminController extends Controller
{
    //

    protected $data;
    public function __construct()
    {

        $this->data['roles'] = Role::all();
        $this->data['organization'] = Organization::all();
        $this->data['station'] = TblStation::all();
        $this->data['msncOffice'] = TblDept::where('stationID',1)->count();
        $this->data['amdlStaff'] = Seeker::count();
        $this->data['msncStaff'] = TblUser::where('mission_station_id', 1)->count();
        $this->data['msncRank'] = TblRank::count();
        $this->data['amdlnomenclature'] = NomenclatureCategory::count();
        $this->data['amdlRank'] = Rank::count();
        $this->data['directors'] = Admin::where('role_id', '6')
            ->count();
        $this->data['sdms'] = Admin::where('role_id', '5')
            ->count();
        $this->data['hrs'] = Admin::where('role_id', '7')
            ->count();
        $this->data['supervisors'] = Admin::where('role_id', '9')
            ->count();
        $this->data['admins'] = Admin::where('role_id', '1')
            ->count();
    }

    public function home()
    {
        $data = $this->data;
        $data['dash_menu'] = true;
        $data['page_title'] = 'Dashboard';
        return view('dashboard', $data);
    }

    public function directorsHome()
    {

        $admin = Session::get('admin');
        $data['id']= 'directorsHome';
        $data['page_title'] = 'Directors Dashboard';
        $data['amdls'] = AdminOffice::where('admin_id', $admin->id)
            ->where('company', 'amdl')->get();


        $data['msncs'] = AdminOffice::where('admin_id', $admin->id)->where('company', 'msnc')->get();
//        if($data['amdls']){$data['amdl'] = 'amdl';}else{$data['amdl']= 'msnc';}
        return view('dashboard', $data);
    }
    public function sdmHome()
    {

        $admin = Session::get('admin');
        $data['page_title'] = 'SDM/Admin Dashboard';
        $data['amdl'] = AdminOffice::where('admin_id', $admin->id)
            ->where('company', 'amdl')->get();
        $data['msnc'] = AdminOffice::where('admin_id', $admin->id)->where('company', 'msnc')->get();
         $data['amdlunits'] = SubDepartment::where('department_id',$admin->organization_id)->count();
        $data['msncunits'] = SubDepartment::where('department_id',$admin->department_id)->count();

        return view('dashboard', $data);
    }

    public function financeHome()
    {

        $admin = Session::get('admin');
        $data['page_title'] = 'Finance Dashboard';
//        $data['amdl'] = AdminOffice::where('admin_id', $admin->id)
//            ->where('company', 'amdl')->get();
//        $data['msnc'] = AdminOffice::where('admin_id', $admin->id)->where('company', 'msnc')->get();
//        $data['amdlunits'] = SubDepartment::where('department_id',$admin->organization_id)->count();
//        $data['msncunits'] = SubDepartment::where('department_id',$admin->department_id)->count();

        return view('dashboard', $data);
    }

    public function directorsDepartmentAmdl($id)
    {

       $id = decrypt($id);
        $data['id']= $id;

                $data['department'] = Organization::where('id', $id)->firstOrFail();
                $data['staff'] = Seeker::where('organization_id', $id)->get();
                $data['grades'] = Grade::where('organization_id', $id)->get();

                $data['reviews'] = Review::where('organization_id', $id)->get();
                $data['probation'] = ProbationStaff::where('department_id', $id)->count();
                $data['sdms'] = Admin::where('organization_id', $id)->where('role_id',5)->get();

                $data['amdlunits'] = SubDepartment::where('department_id',$id)->count();
        $admin = Session::get('admin');

        $data['amdls'] = AdminOffice::where('admin_id', $admin->id)
            ->where('company', 'amdl')
            ->where('organization_id', $id)->get();
        $data['msncs'] =AdminOffice::where('admin_id', $admin->id)
            ->where('company', 'msncs')
            ->where('organization_id', $id)->get();


        $data['page_title'] = $data['department']['name'];

        return view('directors_amdl_departments', $data);
    }
    public function directorsDepartmentMsnc($id)
    {
        $id = decrypt($id);
        $data['id']= $id;
        $admin = Session::get('admin');
        $data['msncs'] = AdminOffice::where('admin_id', $admin->id)->where('company', 'msnc')
            ->where('department_id', $id)->get();
        $data['probation'] = TblProbationStaff::where('station_id', $id)->count();
        $data['department'] = TblDept::where('deptID', $id)->firstOrFail();
        $data['msncunits'] = SubDepartment::where('department_id',$id)->count();
        $data['reviews'] = TblReview::where('organization_id', $id)->get();
        $data['staff'] = TblUser::where('deptID', $id)->get();
        $data['sdms'] = Admin::where('station_id', $id)->where('role_id',5)->get();
        $data['hrs'] = Admin::where('station_id', $id)->where('role_id',7)->get();
        $data['supervisors'] = Admin::where('station_id', $id)->where('role_id',9)->get();
        $data['page_title'] = $data['department']['deptName'];

        $data['amdls'] = AdminOffice::where('admin_id', $admin->id)->where('company', 'msncdgdgdg')
            ->where('department_id', $id)->get();
        return view('directors_msnc_departments', $data);
    }

    public function directors()
    {

        $data['page_title'] = 'All Directors';
        $data['directors_menu'] = true;
        $data['users'] = Admin::where('role_id',6)->get();

        return view('admins.index',$data);
    }

    public function sdms()
    {

        $data['page_title'] = 'All SDM Managers';
        $data['sdms_menu'] = true;
        $data['users'] = Admin::where('role_id',5)->get();
        return view('admins.index',$data);
    }
    public function amdlSdms()
    {
        $admin = Session::get('admin');
        $data['page_title'] = ' SDM Managers';
        $data['users'] = Admin::where('role_id',5)->where('department_id', $admin->department_id)->get();
        return view('admins.index',$data);
    }
    public function msncSdms()
    {
        $admin = Session::get('admin');
        $data['page_title'] = ' SDM Managers';
        $data['users'] = Admin::where('role_id',5)->where('station_id', $admin->station_id)->get();
        return view('admins.index',$data);
    }



    public function supervisors()
    {

        $data['page_title'] = 'All Supervisors';
        $data['hods_menu'] = true;
        $data['users'] = Admin::where('role_id',7)->get();
        return view('admins.index',$data);
    }
    public function amdlHrs()
    {
        $admin = Session::get('admin');
        $data['page_title'] = ' HR Managers';
        $data['users'] = Admin::where('role_id',7)->where('department_id', $admin->department_id)->get();
        return view('admins.index',$data);
    }
    public function msncHrs()
    {
        $admin = Session::get('admin');
        $data['page_title'] = ' SDM Managers';
        $data['users'] = Admin::where('role_id',7)->where('station_id', $admin->station_id)->get();
        return view('admins.index',$data);
    }

    public function financePayroll()
    {

        $data['page_title'] = 'All Payroll Managers';
        $data['finance_menu'] = true;
        $data['users'] = Admin::where('role_id',9)->get();
        return view('admins.index',$data);
    }
    public function amdlSupervisors()
    {
        $admin = Session::get('admin');
        $data['page_title'] = ' Supervisors';
        $data['users'] = Admin::where('role_id',9)->where('department_id', $admin->department_id)->get();
        return view('admins.index',$data);
    }
    public function msncSupervisors()
    {
        $admin = Session::get('admin');
        $data['page_title'] = ' Supervisors';
        $data['users'] = Admin::where('role_id',9)->where('station_id', $admin->station_id)->get();
        return view('admins.index',$data);
    }

    public function index()
    {
        $data = $this->data;
        $data['admin_menu'] = true;
        $users = Admin::where('role_id', '1')->get();
        $data['users'] = Admin::where('role_id', '1')->get();

        $data['roles'] = Role::all();
        $data['page_title'] = 'Administrators';
        return view('admins.index', $data);
    }

    public function create()
    {
        $data = $this->data;
        $data['user'] = new Admin();
        $data['page_title'] = ' Add Administrator';
        return view('admins.create', $data);
    }



    public function store(Request $request)
    {
        $request->validate([
            'company' => 'required',
            'name' => 'required',
            'username' => 'required',
            'role_id' => 'required',

        ]);

        if($request->company == 'amdl'){
            $request->validate([
                'organization_id' => 'required',
            ]);
        }

        if($request->company == 'msnc'){
            $request->validate([
                'station_id' => 'required',
                'department_id' => 'required',
            ]);
        }

        $ev = new Admin();
        $ev->role_id = $request->role_id;
        $ev->name = $request->name;
        $ev->username = $request->username;

        $ev->organization_id = $request->organization_id;
        $ev->department_id = $request->department_id;
        $ev->status = 'verified';

        $ev->save();

        return redirect()->route('admins.index')
            ->with('message', 'Admin created successfully.');

//        $verify = new AuthController();
//        $phone = $verify->verifyKC($request->phone);
//
//        if($phone && array_key_exists('barcode_id', $phone ) ){
//
//        } else {
//            return back()->with('error', 'This Number is not Registered');
//        }

    }


    public function show($id)
    {
        $user = Admin::find($id);

        return view('admins.show', compact('user'));
    }


    public function edit($id)
    {
        $data = $this->data;
        $data['user'] = Admin::find($id);
        $data['page_title'] = 'Edit Admin';

        return view('admins.edit', $data);
    }


    public function update(Request $request, Admin $user)
    {


        $verify = new AuthController();
        $phone = $verify->verifyKC($request->phone);

        if($phone && array_key_exists('barcode_id', $phone ) ){

        } else {
            return back()->with('error', 'This Number is not on KingsChat');
        }

        $user->update($request->all());

        return redirect()->route('admins.index')
            ->with('message', 'Admin updated successfully');
    }


    public function destroy($id)
    {
        $user = Admin::find($id)->delete();

        return redirect()->route('admins.index')
            ->with('message', 'Admin deleted successfully');
    }

}
