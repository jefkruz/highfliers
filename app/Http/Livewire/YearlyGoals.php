<?php

namespace App\Http\Livewire;
use App\Models\YearlyGoals as Yearly;

use Livewire\Component;

class YearlyGoals extends Component
{

    public $perPage = 12, $goals, $name,  $goal_id,$year, $sub,$dept;

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
//
    public function render()
    {


        $this->goals = Yearly::where('department_id',$this->dept->id)->where('sub_department_id',$this->sub->id)->get();

        return view('livewire.yearly-goals');
    }

     private function resetInputFields(){
         $this->year = '';
         $this->name = '';

     }

    public function store()
    {
        $request = $this->validate([
            'name' => 'required',
            'year' => 'required',

        ]);

        Yearly::create([
            'name' => $request['name'],
            'year' => $request['year'],
            'department_id' => $this->dept->id,
            'sub_department_id' => $this->sub->id]);

        session()->flash('message', 'GoalCreated Successfully.');

        $this->resetInputFields();
    }

    public function edit($id)
    {
        $goal = Yearly::where('id',$id)->first();
        $this->goal_id = $goal->id;
        $this->name = $goal->name;
        $this->year = $goal->year;


        $this->updateMode = true;
    }

    public function update()
    {
        $validatedDate = $this->validate([
            'name' => 'required',
            'year' => 'required',

        ]);
//        dd($validatedDate);

        $goal = Yearly::where('id',$this->goal_id)->first();

        $goal->name = $this->name;
        $goal->year = $this->year;
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
        Yearly::where('id',$id)->delete();
        session()->flash('message', 'Goal Deleted Successfully.');
    }
}

