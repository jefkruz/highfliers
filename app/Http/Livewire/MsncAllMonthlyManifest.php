<?php

namespace App\Http\Livewire;

use App\Models\DeptManifest;
use App\Models\ManifestDept;
use App\Models\Seeker;
use App\Models\TblStandardManifest;
use App\Models\TblManifestStand;
use Livewire\Component;
use App\Models\TblDept;
class MsncAllMonthlyManifest extends Component
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
        return view('livewire.msnc-all-monthly-manifest',['users' => $this->search === null ?
            TblDept::orderBy('deptName')->paginate($this->perPage):
            TblDept::where('deptName', 'like', '%' . $this->search . '%')
                ->latest()->paginate( $this->perPage)]);
    }

    public function loadManifest($id)
    {
        //dd($id);
        return TblManifestStand::where('deptID',$id)->orderBy('id', 'DESC')->get();
    }


    public function loadstandUser($id , $org_id)
    {
        //dd($id);
        $this->showDiv = $org_id;
        $student = TblStandardManifest::where('deptID',$id)->first();
        //dd($student->manifest_slug);
        $this->deptUser = TblStandardManifest::where('manifest_slug',$student->manifest_slug)->orderBy('id', 'DESC')->get();
        //dd( $this->deptUser);
    }


}
