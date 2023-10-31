<?php

namespace App\Http\Livewire;

use App\Models\DeptManifest;
use App\Models\ManifestDept;
use App\Models\Seeker;
use App\Models\StandardManifest;
use App\Models\ManifestStand;
use Livewire\Component;
use App\Models\Organization;

class AllMonthlyManifest extends Component
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
//        $users = Organization::orderBy('name')->paginate($this->perPage):
//            Organization::where('name', 'like', '%' . $this->search . '%')
//                ->latest()->paginate($this->limitPerPage);
//        //dd($users);
        $this->emit('userStore');
        return view('livewire.all-monthly-manifest',['users' => $this->search === null ?
            Organization::orderBy('name')->paginate($this->perPage):
            Organization::where('name', 'like', '%' . $this->search . '%')
                ->latest()->paginate( $this->perPage)]);
    }

    public function loadManifest($id)
    {
        //dd($id);
        return ManifestStand::where('organization_id',$id)->orderBy('id', 'DESC')->get();
    }


    public function loadstandUser($id , $org_id)
    {
        //dd($id);
        $this->showDiv = $org_id;
        $student = StandardManifest::findOrFail($id);
        //dd($student->manifest_slug);
       $this->deptUser = StandardManifest::where('manifest_slug',$student->manifest_slug)->orderBy('id', 'DESC')->get();
       //dd( $this->deptUser);
    }
}
