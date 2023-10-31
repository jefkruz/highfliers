<?php

namespace App\Http\Livewire;

use Livewire\Component;

use App\Models\Goal;
use App\Models\Rank;
class SeeAppraisalsUser extends Component
{

    public $perPage = 12,$total_monthly =0,$User_id,$showDiv,$search,$department,$firstName,$otherName,$lastName,$rank_id,$nomenclature_rank;
    protected $queryString = ['search'];
    public $updateMode = false;
    //public $projects;
    // protected $queryString = ['search'];
    public $isModalOpen = 0;
    public $limitPerPage = 10;
    public $ranks;
    public $rank;
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

        return view('livewire.see-appraisals-user',['users' => $this->search === null ?
            Goal::where('appraisals_id',$this->department->id)->paginate($this->perPage):
            Goal::where('appraisals_id',$this->department->id)->where('monthy_goals', 'like', '%' . $this->search . '%')

                ->latest()->paginate($this->perPage)]);
    }
}
