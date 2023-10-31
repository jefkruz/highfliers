<?php

namespace App\Http\Livewire;

use App\Models\ManifestOrganization;
use Livewire\Component;
use App\Models\Organization;

class AllManifest extends Component
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
        $this->perPage = $this->perPage + 5;
    }
    public function render()
    {
        //$users = Organization::orderBy('name')->paginate($this->perPage);
        //dd($users);
        $this->emit('userStore');

        return view('livewire.all-manifest', ['users' => $this->search === null ?
            Organization::orderBy('name')->paginate( $this->perPage):
            Organization::where('name', 'like', '%' . $this->search . '%')
                ->latest()->paginate( $this->perPage)]);
    }
    public function loadManifest($id)
    {
        //dd($id);
        return ManifestOrganization::where('organization_id',$id)->orderBy('id', 'DESC')->get();
    }


}
