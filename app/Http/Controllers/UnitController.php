<?php

namespace App\Http\Controllers;

use App\Models\Organization;
use App\Models\SubDepartment;
use App\Models\Unit;
use Illuminate\Http\Request;

/**
 * Class UnitController
 * @package App\Http\Controllers
 */
class UnitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $id = decrypt($id);
        $dept = Organization::where('id',$id)->first();
        $data['dept'] = $dept;
       // $data['subDepartments'] = SubDepartment::where('department_id',$dept->id)->get();
        $data['units'] = Unit::where('department_id',$dept->id)->get();

      //  dd($data['units']);
        $data['page_title'] = $dept->name .' Units';
        return view('unit.index', $data);

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
        $data['subDepartments'] = SubDepartment::where('department_id',$id)->get();
        $data['unit'] = new Unit();
        $data['page_title'] = 'Create Unit';
        return view('unit.create', $data);
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
            'name' => 'required',

        ]);
        $ev = new Unit();

        $ev->department_id = $request->department_id;
        $ev->name = $request->name;
        $ev->sub_department_id = $request->sub_department_id;
        $ev->save();

        return redirect()->route('unit.index',encrypt($ev->department_id))
            ->with('success', 'Unit created successfully.');
    }


    public function show($id)
    {
        $unit = Unit::find($id);

        return view('unit.show', compact('unit'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $unit = Unit::find($id);

        return view('unit.edit', compact('unit'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Unit $unit
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Unit $unit)
    {
        request()->validate(Unit::$rules);

        $unit->update($request->all());

        return redirect()->route('units.index')
            ->with('success', 'Unit updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $unit = Unit::find($id)->delete();

        return redirect()->route('units.index')
            ->with('success', 'Unit deleted successfully');
    }
}
