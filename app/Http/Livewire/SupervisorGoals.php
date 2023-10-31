<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Goal;
use App\Models\Rank;
class SupervisorGoals extends Component
{

    public $perPage = 12,$total_monthly =0,$User_id,$showDiv,$search,$department,$firstName,$otherName,$lastName,$rank_id;
    protected $queryString = ['search'];
    public $updateMode = false;
    //public $projects;
    // protected $queryString = ['search'];
    public $isModalOpen = 0;
    public $limitPerPage = 10;
    public $ranks;
    public $seeker;
    //public $users;
    protected $listeners = [
        'load-more' => 'loadMore'
    ];

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function loadMore()
    {

        $this->perPage = $this->perPage + 5;
    }
    public function render()
    {
        //dd($this->seeker->id);
        //$this->users = Goal::where('seeker_id',$this->seeker->id)->get();
        //dd($this->users);
        return view('livewire.supervisor-goals',['users' => $this->search === null ?
            Goal::where('seeker_id',$this->seeker->id)->select('appraisals_id')
                ->groupBy('appraisals_id')->paginate($this->perPage):
            Goal::where('seeker_id',$this->seeker->id)->select('appraisals_id')
                ->groupBy('appraisals_id')->latest()->paginate($this->perPage)]);
    }
}
