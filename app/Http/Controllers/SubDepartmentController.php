<?php

namespace App\Http\Controllers;


use App\Models\Admin;
use App\Models\Organization;
use App\Models\Seeker;
use App\Models\SubDepartment;
use App\Models\SubDepStaff;
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

    public function viewAmdlSubDeptStaff($id1, $id2)
    {
        $id =  decrypt($id1);
        $dept =  decrypt($id2);
        $page_title = SubDepartment::where('id',$id)->first();
        $data['page_title'] = $page_title->name .' Staff';
        $data['users'] = SubDepStaff::where('sub_dept_id', $id)->where('dept_id',$dept)->get();
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
