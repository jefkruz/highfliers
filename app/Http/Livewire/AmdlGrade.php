<?php

namespace App\Http\Livewire;

use App\Models\Seeker;
use Livewire\Component;
use App\Models\Grade;
class AmdlGrade extends Component
{
    public $perPage = 12,$total_monthly =0,$User_id,$showDiv,$search,$department, $dept;

    public $updateMode = false;
    //public $projects;
    // protected $queryString = ['search'];
    public $isModalOpen = 0;
    public $limitPerPage = 10;

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

        $this->contacts = Grade::where('seeker_id',$this->dept->id)->latest()->get();
        $this->user = $this->dept->id;

        return view('livewire.amdl-grade');
    }

}
