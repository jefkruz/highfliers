<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Goal as G;
class StaffGoals extends Component
{
    public $contacts, $monthy_goals, $timeline,$end_date, $contact_id,$achievement,$staff_score,$supervisor_score,$hr_score,$ministry,$user_id,$organization_id,$seeker;
    public $updateMode = false;
    public $inputs = [];
    public $i = 1;
    public $org;

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function render()
    {
        $this->contacts = G::where('seeker_id',$this->seeker->id)
            ->where('appraisals_id',$this->org->id)->get();
        return view('livewire.staff-goals');
    }

    private function resetInputFields(){
        $this->rank = '';

    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function store()
    {
        $validatedDate = $this->validate([
            'rank' => 'required',

        ]);
//dd($validatedDate);
        G::create($validatedDate);

        session()->flash('message', 'Post Created Successfully.');

        $this->resetInputFields();
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function edit($id)
    {
        $post = G::find($id);
//         dd($post);
        $this->User_id = $id;
        $this->monthy_goals = $post->monthy_goals;
        $this->timeline = $post->timeline;
        $this->end_date = $post->end_date;
        $this->achievement = $post->achievement;
        $this->staff_score = $post->staff_score;
        $this->supervisor_score = $post->supervisor_score;
        $this->hr_score = $post->hr_score;


        //  dd( $this->firstName);
//echo 'bb';

        $this->updateMode = true;
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function cancel()
    {
        $this->updateMode = false;
        $this->resetInputFields();
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function update()
    {


//        $post = TblRank::where('rankID',$this->rankID)->first();
//
//        $post->rank = $this->rank;
//        $post->save();
        $this->validate([
            'supervisor_score' => 'required',

        ]);

        G::updateOrCreate(['id' => $this->User_id], [
            'supervisor_score' => $this->supervisor_score,

        ]);


        $this->updateMode = false;

        session()->flash('message', 'Post Updated Successfully.');
        $this->resetInputFields();
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function delete($id)
    {
        G::where('id',$id)->delete();
        session()->flash('message', 'Post Deleted Successfully.');
    }

}
