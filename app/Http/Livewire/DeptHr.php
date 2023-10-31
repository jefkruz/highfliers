<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\HrHead;
use App\Models\Rank;
use Illuminate\Support\Facades\Auth;
class DeptHr extends Component
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
        $this->emit('userStore');
        return view('livewire.dept-hr',['users' => $this->search === null ?
            HrHead::where('organization_id',Auth::user()->organization_id)->paginate($this->perPage):
            HrHead::where('organization_id',Auth::user()->organization_id)

                ->latest()->paginate($this->perPage)]);
    }

    public function delete($id)
    {
        HrHead::where('id',$id)->delete();
        session()->flash('message', 'Post Deleted Successfully.');
    }
}
