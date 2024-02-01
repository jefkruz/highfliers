<?php

namespace App\Http\Livewire;
use App\Models\ProbationStaff as Probation;

use App\Models\Seeker;
use App\Models\SubDepartment;
use App\Models\SubDepStaff;
use Livewire\Component;

class ProbationStaff extends Component
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

        $this->staffs = Probation::where('department_id',$this->dept->id)->get();
        $this->members = Seeker::where('organization_id',$this->dept->id)->get();

        return view('livewire.probation-staff');
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



        $user = Seeker::where('id',$this->user_id)->first();

        Probation::create([
            'first_name' => $user->first_name ,
            'last_name' => $user->last_name ,
            'user_id' => $user->id,
            'phone' => $user->phone,
            'company' => 'AMDL',
            'status' => 'PROBATION',
            'email' => $user->email,
            'portal_id' => $user->blw_portal_id,
            'department_id' => $this->dept->id]);

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

        $exists = SubDepStaff::where('dept_id',$this->dept->id)->where('user_id',$this->user_id)->exists();
        if(!$exists){
            SubDepStaff::Create( [
                'dept_id' => $this->dept->id,
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
        $post = Seeker::find($id);
//         dd($this->dept->id);
        $this->user_id = $id;
        $this->portal_id = $post->blw_portal_id;
            $this->firstName = $post->first_name;
            $this->otherName = $post->other_name;
            $this->lastName = $post->last_name;
        $this->supDepts = SubDepartment::where('department_id',$this->dept->id)->get();
        $this->subDeptMode = true;
    }
}
