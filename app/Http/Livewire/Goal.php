<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Http\Livewire\Field;
use App\Models\Goal as G;
use App\Models\Seeker;
use App\Models\TblUser;
use Illuminate\Support\Facades\Auth;
class Goal extends Component
{
    public $contacts, $monthy_goals, $timeline,$end_date, $contact_id,$achievement,$staff_score,$supervisor_score,$hr_score,$ministry,$user_id,$organization_id;
    public $updateMode = false;
    public $inputs = [];
    public $i = 1;
    public $org;

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function add($i)
    {
        $i = $i + 1;
        $this->i = $i;
        array_push($this->inputs ,$i);
    }

    /**
     * Write code on Method
     *
     * @return response() 0043247157
     */
    public function remove($i)
    {
        unset($this->inputs[$i]);
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function render()
    {
        session('admin')->name;
        $this->contacts = G::where('ministry',session('admin')->name)
            ->where('seeker_id',session('admin')->id)
//            ->where('appraisals_id',$this->org->id)
            ->get();
        return view('livewire.goal');
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    private function resetInputFields(){
        $this->organization_id = '';
        $this->monthy_goals = '';
        $this->timeline = '';
        $this->end_date = '';
        $this->achievement = '';
        $this->staff_score = '';
        $this->supervisor_score = '';
        $this->hr_score = '';
        $this->ministry = '';
        $this->user_id = '';
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function store()
    {
        $validatedDate = $this->validate([
            'monthy_goals.0' => 'required',
            'timeline.0' => 'required',
            'end_date.0' => 'required',
            'achievement.0' => 'required',
            'staff_score.0' => 'required',
            'monthy_goals.*' => 'required',
            'timeline.*' => 'required',
            'achievement.*' => 'required',
            'staff_score.*' => 'required',
        ],
            [
                'monthy_goals.0.required' => 'date of review field is required',
                'timeline.0.required' => 'rank field is required',
                'end_date.0.required' => 'salary field is required',
                'achievement.0.required' => 'salary field is required',
                'staff_score.0.required' => 'salary field is required',
                'monthy_goals.*.required' => 'date of review field is required',
                'timeline.*.required' => 'rank field is required',
                'end_date.*.required' => 'salary field is required',
                'achievement.*.required' => 'salary field is required',
                'staff_score.*.required' => 'salary field is required',
            ]
        );

        foreach ($this->monthy_goals as $key => $value) {
            $this->ministry = Auth::user()->ministry;
            if ($this->ministry == 'AMDL') {
               $org= Seeker::where('id',Auth::user()->m_id)->first();
                G::create([

                    'monthy_goals' => $this->monthy_goals[$key],
                    'timeline' => $this->timeline[$key],
                    'end_date' => $this->end_date[$key],
                    'achievement' => $this->achievement[$key],
                    'staff_score' => $this->staff_score[$key],
                    'ministry' => Auth::user()->ministry,
                    'seeker_id' => Auth::user()->m_id,
                    'organization_id' => $org->organization_id,
                    'appraisals_id' => $this->org->id,
                ]);
            }else{
                $org= TblUser::where('userID',Auth::user()->m_id)->first();
                G::create([

                    'monthy_goals' => $this->monthy_goals[$key],
                    'timeline' => $this->timeline[$key],
                    'end_date' => $this->end_date[$key],
                    'achievement' => $this->achievement[$key],
                    'staff_score' => $this->staff_score[$key],
                    'ministry' => Auth::user()->ministry,
                    'user_id' => Auth::user()->m_id,
                    'organization_id' => $org->deptID,
                    'appraisals_id' => $this->org->id,
                ]);
            }
        }
        $this->inputs = [];

        $this->resetInputFields();

        session()->flash('message', 'Contact Has Been Created Successfully.');
    }
}
