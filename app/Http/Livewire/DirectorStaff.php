<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use App\Models\Seeker;
use App\Models\Rank;
use App\Models\HrHead;
use App\Models\Supervisor;
use App\Models\Organization;
use App\Models\NomenclatureCategory;

use App\Models\NomenclatureRank;
use App\Models\NomenclatureGroup;
class DirectorStaff extends Component
{

    public $perPage = 12,$total_monthly =0,$User_id,$showDiv,$search,$department,$firstName,$otherName,$lastName,$rank_id,$blw_portal_id,$nomenclature_rank;
    protected $queryString = ['search'];
    public $updateMode = false;
    //public $projects;
    // protected $queryString = ['search'];
    public $isModalOpen = 0;
    public $limitPerPage = 10;
    public $ranks;
    public $rank;
    public $company;
    public $cats;
    public $cat_id = 0;
    public $nomGroup_id = 0;
    public $nomRank_id =0;
    public $nomGroups;
    public $nomRanks;
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
       // dd($this->department->id );

            return view('livewire.director-staff', ['users' => $this->search === null ?
                Seeker::where('organization_id', $this->department->id)->orderBy('first_name')->paginate($this->perPage) :
                Seeker::where('organization_id', $this->department->id)->where('first_name', 'like', '%' . $this->search . '%')
                    ->where('organization_id', $this->department->id)->orWhere('other_name', 'like', '%' . $this->search . '%')
                    ->where('organization_id', $this->department->id)->orWhere('last_name', 'like', '%' . $this->search . '%')
                    ->latest()->paginate($this->perPage)]);
        }

    private function resetInputFields(){
        $this->rank = '';

    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function store()
    {
        $validatedDate = $this->validate([
            'rank' => 'required',

        ]);
//dd($validatedDate);
        Seeker::create($validatedDate);

        session()->flash('message', 'Post Created Successfully.');

        $this->resetInputFields();
    }
    public function getCompanies(){

        if($this->company == 'rank'){
            $this->ranks = Rank::get();


        }
        if($this->company == 'nomenclature'){

            $this->cats = NomenclatureCategory::all();
        }


    }

    public function getNomGroup(){


        $this->nomGroups = NomenclatureGroup::where('nomenclature_category_id',$this->cat_id)->get();

    }


    public function getNomRank(){


        $this->nomRanks = NomenclatureRank::where('nomenclature_group_id',$this->nomGroup_id)->get();

    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function edit($id)
    {
        $post = Seeker::find($id);
        // dd($post);
        $this->User_id = $id;
        $this->firstName = $post->first_name;
        $this->otherName = $post->other_name;
        $this->lastName = $post->last_name;
        $this->rank_id = $post->rank;
        $this->blw_portal_id = $post->blw_portal_id;
        $this->nomenclature_rank = $post->nomenclature_rank;
        $this->ranks = Rank::get();

        $this->nomGroups = NomenclatureGroup::where('nomenclature_category_id',$this->cat_id)->get();
        $this->nomRanks = NomenclatureRank::where('nomenclature_group_id',$this->nomGroup_id)->get();

        //  dd( $this->firstName);
//echo 'bb';

        $this->updateMode = true;
    }

    public function hr($id)
    {
        $post = Seeker::find($id);
      //dd($post);
        $this->User_id = $id;
        $this->firstName = $post->first_name;
        $this->otherName = $post->organization_id;
        $hr = HrHead::where('seeker_id',$id)->first();
        if($hr) {
            HrHead::updateOrCreate(['id' => $hr->id], [

                'organization_id' => $post->organization_id,
                'seeker_id' => $this->User_id,
            ]);
        }else{


            HrHead::Create([

                'organization_id' => $post->organization_id,
                'seeker_id' => $this->User_id,
            ]);
        }
        //  dd( $this->firstName);
//echo 'bb';

        session()->flash('message', 'HR Updated Successfully.');
    }



    public function supervisor($id)
    {
        $post = Seeker::find($id);
        // dd($post);
        $this->User_id = $id;
        $this->firstName = $post->first_name;
        $this->otherName = $post->organization_id;
        $hr = Supervisor::where('seeker_id',$id)->first();
        if($hr) {
            Supervisor::updateOrCreate(['id' => $hr->id], [

                'organization_id' => $post->organization_id,
                'seeker_id' => $this->User_id,
            ]);
        }else{


            Supervisor::Create([

                'organization_id' => $post->organization_id,
                'seeker_id' => $this->User_id,
            ]);
        }
        //  dd( $this->firstName);
//echo 'bb';

        session()->flash('message', 'Supervisor Updated Successfully.');
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function cancel()
    {
        $this->updateMode = false;
        $this->resetInputFields();
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function update()
    {

        if($this->company == 'rank') {
//        $post = TblRank::where('rankID',$this->rankID)->first();
//
//        $post->rank = $this->rank;
//        $post->save();
            $this->validate([
                'firstName' => 'required',
//            'otherName' => 'required',
                'lastName' => 'required',
                'rank' => 'required',
                'blw_portal_id' => 'required',
//            'nomenclature_rank' => 'required',
            ]);

            Seeker::updateOrCreate(['id' => $this->User_id], [
                'first_name' => $this->firstName,
                'other_name' => $this->otherName,
                'last_name' => $this->lastName,
                'rank_id' => $this->rank,
                'blw_portal_id' => $this->blw_portal_id,

            ]);

            $this->cat_id =0;
            $this->nomGroup_id =0;
            $this->nomRank_id =0;
        }

        if($this->company == 'nomenclature') {
//        $post = TblRank::where('rankID',$this->rankID)->first();
//
//        $post->rank = $this->rank;
//        $post->save();
            $this->validate([
                'firstName' => 'required',
//            'otherName' => 'required',
                'lastName' => 'required',

                'blw_portal_id' => 'required',
//            'nomenclature_rank' => 'required',
            ]);

            Seeker::updateOrCreate(['id' => $this->User_id], [
                'first_name' => $this->firstName,
                'other_name' => $this->otherName,
                'last_name' => $this->lastName,

                'blw_portal_id' => $this->blw_portal_id,

                'nomenclature_category_id' => $this->cat_id,
                'nomenclature_group_id' => $this->nomGroup_id,
                'nomenclature_rank_id' => $this->nomRank_id,
            ]);

            $this->cat_id =0;
            $this->nomGroup_id =0;
            $this->nomRank_id =0;
        }
        $this->updateMode = false;

        session()->flash('message', 'Post Updated Successfully.');
        $this->resetInputFields();
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function delete($id)
    {
        Seeker::where('id',$id)->delete();
        session()->flash('message', 'Staff Deleted Successfully.');
    }

    public function ban($id)
    {
        $post = Seeker::find($id);
        if($post->ban== 0) {
            Seeker::where('id', $id)->update(['ban' => '1']);
            session()->flash('message', 'Staff Disengaged Successfully.');
        }else{
            Seeker::where('id', $id)->update(['ban' => '0']);
            session()->flash('message', 'Staff engaged Successfully.');
        }
    }

}
