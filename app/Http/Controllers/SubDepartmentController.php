<?php

namespace App\Http\Controllers;


use App\Models\Admin;
use App\Models\AdminOffice;
use App\Models\Organization;
use App\Models\Seeker;
use App\Models\SubDepartment;
use App\Models\SubDepStaff;
use App\Models\SubDeptHod;
use App\Models\TblDept;
use Illuminate\Http\Request;

/**
 * Class SubDepartmentController
 * @package App\Http\Controllers
 */
class SubDepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $id = decrypt($id);
//        $subDepartments = SubDepartment::paginate();
        $dept = Organization::where('id',$id)->first();
        $data['dept'] = Organization::where('id',$id)->first();
        $data['subDepartments'] = SubDepartment::where('department_id',$dept->id)->get();


        $data['page_title'] = $dept->name;
        return view('sub-department.index', $data);

    }

    public function msncindex($id)
    {
        $id = decrypt($id);
//        $subDepartments = SubDepartment::paginate();
        $dept = TblDept::where('deptID',$id)->first();
        $data['dept'] = TblDept::where('deptID',$id)->first();
        $data['subDepartments'] = SubDepartment::where('department_id',$dept->deptID)->get();


        $data['page_title'] = $dept->deptName;
        return view('sub-department.msncindex', $data);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $id = decrypt($id);

        $data['dept'] = Organization::where('id',$id)->first();
//        $data['hods'] = Admin::where('organization_id',$id)->where('role_id',10)->get();
        $data['page_title'] = 'Create Sub-Department';
        return view('sub-department.create', $data);
    }

    public function createMsnc($id)
    {
        $id = decrypt($id);
        $data['dept'] = TblDept::where('deptID',$id)->first();
//        $data['hods'] = Admin::where('organization_id',$id)->where('role_id',10)->get();
        $data['page_title'] = 'Create Sub-Department';
        return view('sub-department.createmsnc', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        $request->validate([
            'department_id' => 'required',
            'name' => 'required|unique:sub_departments',

        ]);
        $ev = new SubDepartment();

        $ev->department_id = $request->department_id;
        $ev->name = $request->name;
        $ev->save();

        return redirect()->back()
            ->with('message', 'SubDepartment created successfully.');
    }
    public function storeMsnc(Request $request)
    {
        $request->validate([
            'department_id' => 'required',
            'name' => 'required|unique:sub_departments',

        ]);
        $ev = new SubDepartment();

        $ev->department_id = $request->department_id;
        $ev->name = $request->name;
        $ev->save();

        return redirect()->back()
            ->with('message', 'SubDepartment created successfully.');
    }

    public function assignAmdlHod($id)
    {
      $id = decrypt($id);
      $data['user'] = SubDepStaff::where('id', $id)->first();
        return view ('admins.amdl_create_hod',$data);
    }

    public function viewAmdlSubDeptStaff($id1, $id2)
    {
        $id =  decrypt($id1);
        $dept =  decrypt($id2);
        $page_title = SubDepartment::where('id',$id)->first();
        $data['page_title'] = $page_title->name .' Staff';
        $data['users'] = SubDepStaff::where('sub_dept_id', $id)->where('dept_id',$dept)->get();
        $data['hod']= SubDeptHod::where('sub_dept_id', $id)->where('dept_id',$dept)->first();

        return view ('organization.subdept-amdl',$data);
    }
    public function viewMsncSubDeptStaff($id1, $id2)
    {
        $id =  decrypt($id1);
        $dept =  decrypt($id2);
        $page_title = SubDepartment::where('id',$id)->first();
        $data['page_title'] = $page_title->name .' Staff';
        $data['users'] = SubDepStaff::where('sub_dept_id', $id)->where('dept_id',$dept)->get();
        return view ('organization.subdept-msnc',$data);
    }

    public function storeAmdlHod(Request $request)
    {

        $request->validate([
            'sub_dept_staff_id' => 'required',
            'name' => 'required',
            'department_id' => 'required',
            'sub_department_id' => 'required',
            'phone' => ['required', 'regex:/^234[789]\d{9}$/'],
            'username' => 'required',
        ],
            [
                'phone.regex' => 'Invalid phone number format. It should start with 234 and have a total of 13 digits.',

            ]);
        $phone = $this->verifyKC($request->phone);

        if($phone && array_key_exists('barcode_id', $phone ) ){

        } else {
            return back()->with('error', 'This Number is not Registered on KingsChat');
        }

        $adminExists = Admin::where('username',$request->username)->orWhere('phone',$request->phone)->first();


        if(!$adminExists){
            $admin = Admin::Create([
                'name' => $request->name,
                'username' => $request->username,
                'phone' => $request->phone,
                'company' => 'amdl',
                'organization_id' => $request->department_id,
                'role_id' => 10,
                'status' => 'verified',

            ]);

            AdminOffice::Create([
                'admin_id' => $admin->id,
                'company' => 'amdl',
                'organization_id' => $admin->organization_id,

            ]);
        } else{
            AdminOffice::Create([
                'admin_id' =>  $adminExists->id,
                'company' => 'amdl',
                'organization_id' => $adminExists->organization_id,

            ]);
        }

        $staff = Admin::where('username',$request->username)->orWhere('phone',$request->phone)->first();
        $office = AdminOffice::where('admin_id',$staff->id)->first();

        $hodExists = SubDeptHod::where('sub_dept_id',$request->sub_department_id)->where('dept_id',$request->department_id)->first();

        if(!$hodExists){
            $hod = new SubDeptHod();
            $hod->sub_dept_staff_id = $request->sub_dept_staff_id;
            $hod->dept_id = $request->department_id;
            $hod->sub_dept_id = $request->sub_department_id;
            $hod->admin_id =$staff->id;
            $hod->admin_office_id =$office->id;
            $hod->save();
        }else{

            $hodExists->update([
                'sub_dept_staff_id' => $request->sub_dept_staff_id,
                'dept_id' => $request->department_id,
                'sub_dept_id' => $request->sub_department_id,
                'admin_id' => $staff->id,
                'admin_office_id' => $office->id,
            ]);
        }


        return redirect()->route('viewAmdlSubDeptStaff',['id1' => encrypt($request->sub_department_id), 'id2' => encrypt($request->department_id)])
            ->with('message', 'HOD Assigned successfully.');
    }

    private function verifyKC($phone)
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://api.joinkingschat.com/api/v1/barcode/+' . $phone . '/exists',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        return json_decode($response, true) ?? false;

    }
    public function show($id)
    {
        $subDepartment = SubDepartment::find($id);

        return view('sub-department.show', compact('subDepartment'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $subDepartment = SubDepartment::find($id);

        return view('sub-department.edit', compact('subDepartment'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  SubDepartment $subDepartment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SubDepartment $subDepartment)
    {
        request()->validate(SubDepartment::$rules);

        $subDepartment->update($request->all());

        return redirect()->route('sub-departments.index')
            ->with('success', 'SubDepartment updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $subDepartment = SubDepartment::find($id)->delete();

        return redirect()->back()
            ->with('message', 'SubDepartment deleted successfully');
    }
}
