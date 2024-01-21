<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\MonthlyGoals as Monthly;

class MonthlyGoals extends Component
{
    public $perPage = 12, $yearly, $name,$yearly_id,$department_id,  $sub, $sub_department_id, $staff_id, $achievement,
    $timeline, $end_date,$score,$supervisor_score,$hr_score, $staffs;
    public $updateMode = false;
    public $inputs = [];
    public $isModalOpen = 0;
    public $limitPerPage = 10;

    protected $listeners = [
        'load-more' => 'loadMore'
    ];
    public function loadMore()
    {

        $this->perPage = $this->perPage + 5;
    }
    public function render()
    {
        $this->goals = Monthly::where('yearly_id',$this->yearly->id)->where('sub_department_id',$this->sub->id)->get();
        return view('livewire.monthly-goals');
    }

    private function resetInputFields(){
        $this->achievement = '';
        $this->name = '';
        $this->yearly_id = '';
        $this->timeline = '';
        $this->end_date = '';
        $this->staff_id = '';
        $this->hr_score = '';
        $this->supervisor_score = '';
        $this->score = '';
        $this->name = '';

    }

    public function store()
    {
        $request = $this->validate([
            'name' => 'required',
            'achievement' => 'required',
            'timeline' => 'required',
            'end_date' => 'required',
            'staff_id' => 'required',
            'yearly_id' => 'required',

        ]);


        Monthly::create([
            'name' => $request['name'],
            'achievement' => $request['achievement'],
            'timeline' => $request['timeline'],
            'end_date' => $request['end_date'],
            'staff_id' => $request['staff_id'],
            'department_id' => $this->sub->department_id,
            'yearly_id' => $this->yearly->id,
            'sub_department_id' => $this->sub->id]);

        session()->flash('message', 'Goal Created Successfully.');

        $this->resetInputFields();
    }

    public function edit($id)
    {
        $goal = Monthly::where('id',$id)->first();
        $this->goal_id = $goal->id;
        $this->name = $goal->name;
        $this->achievement = $goal->achievement;
        $this->timeline = $goal->timeline;
        $this->end_date = $goal->end_date;
        $this->yearly_id = $goal->yearly_id;
        $this->score = $goal->score;
        $this->hr_score = $goal->hr_score;
        $this->supervisor_score = $goal->supervisor_score;


        $this->updateMode = true;
    }
}
