<?php

namespace App\Http\Controllers;


use App\Models\Admin;
use App\Models\Organization;
use App\Models\SubDepartment;
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
    public function index()
    {
        $subDepartments = SubDepartment::paginate();

        return view('sub-department.index', compact('subDepartments'))
            ->with('i', (request()->input('page', 1) - 1) * $subDepartments->perPage());
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

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
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

        return redirect()->route('sub-departments.index')
            ->with('success', 'SubDepartment deleted successfully');
    }
}
