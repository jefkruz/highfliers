<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Admin;
class Director extends Component
{

    public $perPage = 12,$total_monthly =0,$deptUser,$showDiv,$search;
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
        $this->emit('userStore');
        return view('livewire.director',['organizations' => $this->search === null ?
            Admin::where('role_id', '6')
                ->where('ministry', 'AMDL')->orderBy('name')->paginate($this->perPage):
            Admin::where('role_id', '6')
                ->where('ministry', 'AMDL')->where('name', 'like', '%' . $this->search . '%')
                ->latest()->paginate($this->perPage)]);
    }
}
