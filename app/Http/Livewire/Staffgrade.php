<?php

namespace App\Http\Livewire;

use App\Models\TblGrade;
use Livewire\Component;

class Staffgrade extends Component
{

    public $perPage = 12,$total_monthly =0,$User_id,$showDiv,$search,$department,$firstName,$otherName,$lastName,$rank_id;
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
        return view('livewire.staffgrade',['users' => $this->search === null ?
            TblGrade::where('userID',$this->department->userID)->orderBy('year')->paginate($this->perPage):
            TblUser::where('userID',$this->department->userID)

                ->latest()->paginate($this->perPage)]);
    }
}
