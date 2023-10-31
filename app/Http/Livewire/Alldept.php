<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\TblDept;
class Alldept extends Component
{

    public $perPage = 12,$total_monthly =0,$deptUser,$showDiv,$search,$department;
    protected $queryString = ['search'];
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
        //return view('livewire.alldept');
        $this->emit('userStore');
        return view('livewire.dept',['organizations' => $this->search === null ?
            TblDept::orderBy('deptName')->paginate($this->perPage):
            TblDept::where('deptName', 'like', '%' . $this->search . '%')
                ->latest()->paginate($this->perPage)]);
    }
}
