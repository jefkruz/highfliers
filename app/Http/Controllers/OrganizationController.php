<?php

namespace App\Http\Controllers;

use App\Models\Goal;
use App\Models\Review;
use App\Models\Grade;
use App\Models\Organization;
use App\Models\Role;
use App\Models\Seeker;
use App\Models\Skill;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use DB;
/**
 * Class OrganizationController
 * @package App\Http\Controllers
 */
class OrganizationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['organizations'] = Organization::paginate();
        $data['page_title'] = 'AMDL Organizations';
        $data['organization_menu'] = true;


        return view('organization.index', $data);
    }




    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $organization = new Organization();
        return view('organization.create', compact('organization'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Organization::$rules);

        $organization = Organization::create($request->all());

        return redirect()->route('organizations.index')
            ->with('success', 'Organization created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $organization = Organization::find($id);
        $data['organization'] = Organization::find($id);
        $data['page_title'] =  $organization->name;
        $data['organization_menu'] = true;
        return view('organization.show', $data);
    }

    public function amdlProfile($id)
    {
        $id = decrypt($id);
        $data['page_title'] = 'Staff Profile';
        $data['member'] = Seeker::where('id',$id)->firstOrfail();
        $data['grades'] = Grade::where('seeker_id',$id)->get();
        $data['reviews'] = Review::where('seeker_id',$id)->get();
        $data['goals'] = Goal::where('seeker_id',$id)->get();
        $data['skills'] = Skill::where('seeker_id',$id)->get();
        $data['organization_menu'] = true;
        return view('organization.profile', $data);
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $organization = Organization::find($id);

        return view('organization.edit', compact('organization'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Organization $organization
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Organization $organization)
    {
        request()->validate(Organization::$rules);

        $organization->update($request->all());

        return redirect()->route('organizations.index')
            ->with('success', 'Organization updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $organization = Organization::find($id)->delete();

        return redirect()->route('organizations.index')
            ->with('success', 'Organization deleted successfully');
    }

    public function user($id)
    {
       // dd($id);
        $organization = Organization::find($id);
        $roles = Role::all();

        return view('form-validation', compact('organization','roles'));
    }


    public function reviewIndex($id){

        $id = decrypt($id);
        $dept = Organization::where('id',$id)->first();
        $data['page_title'] = $dept->name . ' Reviews';
        $data['reviews'] = Review::where('organization_id',$id)
          //  ->select("reviews.*",DB::raw("SUM(reviews.seeker_id)"))
            ->latest()->get();
        return view('reviews.index', $data);

     }



}
