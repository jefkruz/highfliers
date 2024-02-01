<?php

namespace App\Http\Livewire;

use App\Models\TblProbationStaff as Probation;
use App\Models\SubDepartment;
use App\Models\SubDepStaff;
use App\Models\TblUser;
use Livewire\Component;

class TblProbationStaff extends Component
{
    public $portal_id, $supDepts, $sub_dept_id, $perPage = 12, $year, $user_id, $department_id, $unit_id, $company, $first_name, $last_name,$email, $phone, $dept, $status;
    public $isModalOpen = 0;
    public $limitPerPage = 10;
    public $updateMode = false;
    public $createMode = false;
    public $subDeptMode = false;
    protected $listeners = [
        'load-more' => 'loadMore'
    ];
    public function loadMore()
    {

        $this->perPage = $this->perPage + 5;
    }
    public function render()
    {

        $this->staffs = Probation::where('station_id',$this->dept->deptID)->get();
        $this->members = TblUser::where('deptID',$this->dept->deptID)->get();

        return view('livewire.tbl-probation-staff');
    }

    public function create()
    {
        $this->createMode = true;
    }

    public function cancel()
    {
        //$this->subDeptMode = false;

        $this->createMode = false;
        $this->subDeptMode = false;
        $this->resetInputFields();
    }

    public function store()
    {

        $request = $this->validate([
            'user_id' => 'required|unique:probation_staff',

        ]);



        $user = TblUser::where('userID',$this->user_id)->first();

        Probation::create([
            'first_name' => $user->firstName ,
            'last_name' => $user->lastName ,
            'user_id' => $user->userID,
            'phone' => $user->phoneNum,
            'company' => 'MSNC',
            'status' => 'PROBATION',
            'email' => $user->emailAddress,
            'portal_id' => $user->portalID,
            'station_id' => $this->dept->deptID]);

        session()->flash('message', 'Record Created Successfully.');

        $this->resetInputFields();
    }

    private function resetInputFields(){
        $this->user = '';

    }

    public function updateSubUser()
    {


        $this->validate([

            'sub_dept_id' => 'required',

        ]);

        $exists = SubDepStaff::where('dept_id',$this->dept->deptID)->where('user_id',$this->user_id)->exists();
        if(!$exists){
            SubDepStaff::Create( [
                'dept_id' => $this->dept->deptID,
                'sub_dept_id' => $this->sub_dept_id,
                'user_id' => $this->user_id,


            ]);



            $this->createMode = false;
            $this->subDeptMode = false;

            session()->flash('message', 'Staff Assigned Successfully.');
            $this->resetInputFields();


        }else{
            session()->flash('message', 'This Staff Is Already Assigned.');
            $this->resetInputFields();
        }


    }

    public function subDept($id)
    {
        $post = TblUser::where('userID',$id)->first();
//         dd($this->dept->id);
        $this->user_id = $id;
        $this->portal_id = $post->portalID;
        $this->firstName = $post->firstName;
        $this->otherName = $post->otherName;
        $this->lastName = $post->lastName;
        $this->supDepts = SubDepartment::where('department_id',$this->dept->deptID)->get();
        $this->subDeptMode = true;
    }
}
