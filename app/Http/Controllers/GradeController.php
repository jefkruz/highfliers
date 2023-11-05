<?php

namespace App\Http\Controllers;

use App\Models\Grade;
use App\Models\Seeker;
use App\Models\TblUser;
use Illuminate\Http\Request;

class GradeController extends Controller
{
    //
    public function grade($id)
    {

        $id = decrypt($id);
        $staff = Seeker::where('id', $id)->first();
        $data['staff'] = Seeker::where('id', $id)->first();
        $data['page_title'] = 'Grade '. $staff->title.' '. $staff->first_name.' '.$staff->other_name.' '.$staff->last_name ;
        return view('grades.create', $data);
    }

    public function msncGrade($id)
    {

        $id = decrypt($id);
        $staff = TblUser::where('userID', $id)->first();
        $data['staff'] = TblUser::where('userID', $id)->first();
        $data['page_title'] = 'Grade '.  $staff->firstName.' '.$staff->otherName.' '.$staff->lastName ;
        return view('grades.create', $data);
    }


    public function amdlStoreGrade(Request $request)
    {
        $request->validate([
            'seeker_id' => 'required',
            'year' => 'required',
            'organization_id' => 'required',
            'grade_score' => 'required',

        ]);

        $ev = new Grade();
        $ev->seeker_id= $request->seeker_id;
        $ev->year = $request->year;
        $ev->organization_id = $request->organization_id;
        $ev->grade_score = $request->grade_score;
        $ev->save();

        return redirect()->back()->with('message', 'Staff Graded successfully.');

    }

}
