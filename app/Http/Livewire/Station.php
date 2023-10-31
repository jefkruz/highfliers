<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\TblStation;
use Illuminate\Support\Facades\Crypt;
class Station extends Component
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
        return view('livewire.station',['organizations' => $this->search === null ?
            TblStation::orderBy('stationName')->paginate($this->perPage):
            TblStation::where('stationName', 'like', '%' . $this->search . '%')->
                orderBy('updated_at', 'desc')
                ->latest()->paginate($this->perPage)]);
    }
}
