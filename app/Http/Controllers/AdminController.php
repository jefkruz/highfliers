<?php

namespace App\Http\Controllers;

use App\Models\AdminOffice;
use App\Models\Organization;
use App\Models\Rank;
use App\Models\Role;
use App\Models\Admin;
use App\Models\Seeker;
use App\Models\TblDept;
use App\Models\TblRank;
use App\Models\TblStation;
use App\Models\TblUser;
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
        $this->data['users'] = Admin::all();
        $this->data['roles'] = Role::all();
        $this->data['organization'] = Organization::all();
        $this->data['station'] = TblStation::all();
        $this->data['msncOffice'] = TblDept::count();
        $this->data['amdlStaff'] = Seeker::count();
        $this->data['msncStaff'] = TblUser::count();
        $this->data['msncRank'] = TblRank::count();
        $this->data['amdlRank'] = Rank::count();
        $this->data['directors'] = Admin::where('role_id', '6')
            ->count();

    }

    public function home()
    {
        $data = $this->data;
        $data['page_title'] = 'Dashboard';
        return view('dashboard', $data);
    }

    public function directorsHome()
    {

        $admin = Session::get('admin');
        $data['page_title'] = 'Directors Dashboard';

        $data['amdl'] = DB::table('admin_offices')
            ->join('organizations', 'admin_offices.organization_id', '=', 'organizations.id')
            ->join('seekers', 'organizations.id', '=', 'seekers.organization_id')
            ->select('organizations.id as id', 'organizations.name as name', DB::raw("count(seekers.organization_id) as count"))
            ->where('admin_offices.admin_id',$admin->id)
            ->where('admin_offices.company', 'amdl')->groupBy('organizations.id')
            ->get();

        $data['msnc'] = DB::table('admin_offices')
            ->join('db_msnc2.tbl_depts', 'admin_offices.department_id', '=', 'db_msnc2.tbl_depts.deptID')
            ->where('admin_offices.admin_id',$admin->id)
            ->where('admin_offices.company', 'msnc')
            ->get();

        return view('dashboard', $data);
    }

    public function directorsDepartment($id)
    {
       $id = decrypt($id);
        $admin = Session::get('admin');



        $data['department'] = Organization::where('id', $id)->firstOrFail();
        $data['staff'] = Seeker::where('organization_id', $id)->get();
        $data['sdms'] = Admin::where('organization_id', $id)->where('role_id',5)->get();
        $data['hrs'] = Admin::where('organization_id', $id)->where('role_id',5)->get();
        $data['page_title'] = $data['department']['name'];

        return view('directors_departments', $data);
    }

    public function index()
    {
        $data = $this->data;
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
