<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\MonthlyGoals as Monthly;

class MonthlyGoals extends Component
{
    public $perPage = 12, $yearly, $name,$yearly_id,$department_id,  $dept, $sub, $sub_department_id, $staff_id, $achievement,
    $timeline, $end_date,$score,$supervisor_score,$hr_score, $staff;
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

        $this->goals = Monthly::where('staff_id',$this->staff->user_id)->where('department_id',$this->dept->id)->get();
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

        ]);


        Monthly::create([
            'name' => $request['name'],
            'achievement' => $request['achievement'],
            'timeline' => $request['timeline'],
            'end_date' => $request['end_date'],
            'staff_id' => $this->staff->user_id,
            'department_id' => $this->dept->id
//            'sub_department_id' => $this->sub->id
          ]);

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
        $this->score = $goal->score;
        $this->hr_score = $goal->hr_score;
        $this->supervisor_score = $goal->supervisor_score;


        $this->updateMode = true;
    }
    public function update()
    {
        $validatedDate = $this->validate([
            'name' => 'required',
            'achievement' => 'required',
            'timeline' => 'required',

        ]);
//        dd($validatedDate);

        $goal = Monthly::where('id',$this->goal_id)->first();

        $goal->name = $this->name;
        $goal->achievement = $this->achievement;
        $goal->timeline = $this->timeline;
        $goal->end_date = $this->end_date;
        $goal->score = $this->score;
        $goal->hr_score = $this->hr_score;
        $goal->supervisor_score = $this->supervisor_score;
        $goal->save();
        $this->updateMode = false;

        session()->flash('message', 'Goal Updated Successfully.');
        $this->resetInputFields();
    }

    public function cancel()
    {
        $this->updateMode = false;
        $this->resetInputFields();
    }

    public function delete($id)
    {
        Monthly::where('id',$id)->delete();
        session()->flash('message', 'Goal Deleted Successfully.');
    }
}
