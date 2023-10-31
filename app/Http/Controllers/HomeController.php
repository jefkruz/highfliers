<?php

namespace App\Http\Controllers;

use App\Models\Organization;
use App\Models\OrgAppraisal;
use App\Models\Rank;
use App\Models\Seeker;
use App\Models\Staff;
use App\Models\TblDept;
use App\Models\TblRank;
use App\Models\TblStation;
use App\Models\TblUser;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{



    public function root()
    {
        if(session('admin')->role_id == 1) {
            $data['organization'] = Organization::count();
            $data['station'] = TblStation::count();
            $data['msncOffice'] = TblDept::count();
            $data['amdlStaff'] = Seeker::count();
            $data['msncStaff'] = TblUser::count();
            $data['msncRank'] = TblRank::count();
            $data['amdlRank'] = Rank::count();
            $data['amdlDirectors'] = Admin::where('role_id', '6')
                ->where('ministry', 'AMDL')->count();
            $data['msncDirectors'] = Admin::where('role_id', '6')
                ->where('ministry', 'MSNC')->count();
        }


        $org= Seeker::find(Auth::user()->m_id);

        if(Auth::user()->role_id ==6){
            $data['director_org'] = OrgAppraisal::where('organization_id',Auth::user()->morganization_id)->count();

            $data['director_seeker'] = Seeker::where('organization_id',Auth::user()->organization_id)->count();
        }

        if(Auth::user()->role_id ==7){

            $data['director_seeker'] = Seeker::where('organization_id',$org->organization_id)->count();
        }

        if(Auth::user()->role_id ==8){

            $data['staff'] = Staff::where('supervisor_id',$org->id)->count();
        }
        if(Auth::user()->role_id ==2){

            $data['goals'] = '';
        }

        $data['page_title'] = 'Home';
        $data['dash_menu'] = true;
        return view('home',$data);
    }


}
