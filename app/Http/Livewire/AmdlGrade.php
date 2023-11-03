<?php

namespace App\Http\Livewire;

use App\Models\Seeker;
use Livewire\Component;
use App\Models\Grade;
class AmdlGrade extends Component
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
        return view('livewire.amdl-grade',['users' => $this->search === null ?
            Grade::where('seeker_id',$this->department->id)->orderBy('year')->paginate($this->perPage):
            Seeker::where('id',$this->department->id)

                ->latest()->paginate($this->perPage)]);
    }
}
