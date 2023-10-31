<?php

namespace App\Http\Livewire;

use App\Models\TblManifestOrganization;
use Livewire\Component;
use App\Models\TblDept;

class MsncAllManifest extends Component
{
    public $perPage = 12,$total_monthly =0,$search;
    protected $queryString = ['search'];
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

        $this->emit('userStore');
        $this->perPage = $this->perPage + 5;
    }
    public function render()
    {
        return view('livewire.msnc-all-manifest', ['users' => $this->search === null ?
            TblDept::orderBy('deptName')->paginate( $this->perPage):
            TblDept::where('deptName', 'like', '%' . $this->search . '%')
                ->latest()->paginate( $this->perPage)]);
    }

    public function loadManifest($id)
    {
        //dd($id);
        return TblManifestOrganization::where('deptID',$id)->orderBy('id', 'DESC')->get();
    }
}
