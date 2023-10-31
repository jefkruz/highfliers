<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Supervisor;
use App\Models\Rank;
use Illuminate\Support\Facades\Auth;
class DeptSupervisor extends Component
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
        return view('livewire.dept-supervisor',['users' => $this->search === null ?
            Supervisor::where('organization_id',Auth::user()->organization_id)->paginate($this->perPage):
            Supervisor::where('organization_id',Auth::user()->organization_id)

                ->latest()->paginate($this->perPage)]);
    }

    public function delete($id)
    {
        Supervisor::where('id',$id)->delete();
        session()->flash('message', 'Post Deleted Successfully.');
    }
}
