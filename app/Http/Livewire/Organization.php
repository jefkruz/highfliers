<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Organization as org;
use Illuminate\Support\Str;
class Organization extends Component
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
        return view('livewire.organization',['organizations' => $this->search === null ?
            Org::orderBy('name')->paginate($this->perPage):
            Org::where('name', 'like', '%' . $this->search . '%')
                ->latest()->paginate($this->perPage)]);
    }


}
