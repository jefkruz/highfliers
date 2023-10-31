<?php

namespace App\Http\Livewire;

use App\Models\Admin;
use App\Models\Organization;
use App\Models\Role;
use App\Models\AdminOffice;
use App\Models\TblDept;
use App\Models\TblStation;
use Livewire\Component;

class Admins extends Component
{
    public $company, $organization,$selected, $name, $username, $role_id, $station;

    public $organization_id = 0;
    public $department = [];
    public $station_id = 0;
    public $department_id = 0;

    protected $rules = [
        'station' => 'required', // Add your validation rules here
    ];

    public function render()
    {
        $data['roles'] = Role::all();
//        $data['organization'] = Organization::all();
        $data['station'] = TblStation::all();
//        $data['msncOffice'] = TblDept::count();
        return view('livewire.admins',$data);
    }

    public function getCompanies(){

        if($this->company == 'amdl'){
           $this->organization =Organization::all();
            unset($this->conpany);

            $this->station = 0;

        }
        if($this->company == 'msnc'){

            $this->station = TblStation::all();
        }


    }
    public function getDepartments(){


        $this->department = TblDept::where('stationID',$this->station_id)->get();

    }

    public function store()
    {

       $this->selected = Admin::where('username',$this->username)->get();
       //dd( $this->selected->count());
       if($this->selected->count() ==0) {
           if ($this->company == 'amdl') {
               $this->validate([
                   'name' => 'required',
                   'username' => 'required|unique:admins',
                   'role_id' => 'required',
                   'company' => 'required',
                   'organization_id' => 'required',
               ]);
               $amdl = Admin::Create([
                   'name' => $this->name,
                   'username' => $this->username,
                   'company' => $this->company,
                   'organization_id' => $this->organization_id,
                   'role_id' => $this->role_id,
                   'status' => 'verified',

               ]);

               AdminOffice::Create([
                   'admin_id' => $amdl->id,
                   'company' => $this->company,
                   'organization_id' => $this->organization_id,


               ]);

           }

           if ($this->company == 'msnc') {
               $this->validate([
                   'name' => 'required',
                   'username' => 'required|unique:admins',
                   'company' => 'required',
                   'role_id' => 'required',
                   'station_id' => 'required',
                   'department_id' => 'required',
               ]);
               $msnc = Admin::Create([
                   'name' => $this->name,
                   'company' => $this->company,
                   'username' => $this->username,
                   'station_id' => $this->station_id,
                   'department_id' => $this->department_id,
                   'role_id' => $this->role_id,
                   'status' => 'verified',

               ]);
               AdminOffice::Create([
                   'admin_id' => $msnc->id,
                   'company' => $this->company,
                   'station_id' => $this->station_id,
                   'department_id' => $this->department_id,


               ]);
           }
       }else{
           if ($this->company == 'msnc') {
             //  dd($this->selected);
               AdminOffice::Create([
                   'admin_id' => $this->selected[0]->id,
                   'company' => $this->company,
                   'station_id' => $this->station_id,
                   'department_id' => $this->department_id,


               ]);
           }

           if ($this->company == 'amdl') {
               AdminOffice::Create([
                   'admin_id' => $this->selected[0]->id,
                   'company' => $this->company,
                   'organization_id' => $this->organization_id,


               ]);
           }

       }
        $this->name ='';
        $this->username ='';
        $this->company ='';
        $this->station_id = '';
        $this->department_id= '';
        $this->organization_id= '';
        $this->role_id = '';



        session()->flash('message', 'Admin Created Successfully.');


    }
}
