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
        $this->timeline = '';
        $this->end_date = '';
        $this->staff_id = '';
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
            'hr_score' => 'required',
            'supervisor_score' => 'required',
            'score' => 'required',

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
}
