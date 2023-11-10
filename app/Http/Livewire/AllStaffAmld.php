<?php

namespace App\Http\Livewire;

use App\Models\NomenclatureCategory;
use App\Models\Organization;
use App\Models\TblDept;
use App\Models\TblStation;
use Livewire\Component;
use App\Models\Seeker;
use App\Models\Rank;
use App\Models\NomenclatureRank;
use App\Models\NomenclatureGroup;

class AllStaffAmld extends Component
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

        $this->emit('userStore');
       // return view('livewire.all-staff-amld');

        return view('livewire.staff-amdl',['users' => $this->search === null ?
            Seeker::orderBy('organization_id','asc')->paginate($this->perPage):
            Seeker::where('first_name', 'like', '%' . $this->search . '%')
                ->orWhere('other_name', 'like', '%' . $this->search . '%')
                ->orWhere('last_name', 'like', '%' . $this->search . '%')
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
        $this->ranks = Rank::get();
        $this->nomGroups = NomenclatureGroup::where('nomenclature_category_id',$this->cat_id)->get();
        $this->nomRanks = NomenclatureRank::where('nomenclature_group_id',$this->nomGroup_id)->get();
        //  dd( $this->firstName);
//echo 'bb';

        $this->updateMode = true;
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


//        $post = TblRank::where('rankID',$this->rankID)->first();
//
//        $post->rank = $this->rank;
//        $post->save();

        if($this->company == 'rank') {
//            $this->validate([
//                'firstName' => 'required',
//                'otherName' => 'required',
//                'lastName' => 'required',
//                'rank' => 'required',
//            ]);
        //dd($this->firstName);
          $see=  Seeker::where('id',$this->User_id )->update([
                'first_name' => $this->firstName,
                'other_name' => $this->otherName,
                'last_name' => $this->lastName,
                'rank_id' => $this->rank,
            ]);
       ;
            $this->cat_id =0;
            $this->nomGroup_id =0;
            $this->nomRank_id =0;
           // dd($see);
        }

        if($this->company == 'nomenclature') {


            Seeker::where('id',$this->User_id )->update([
                'first_name' => $this->firstName,
                'other_name' => $this->otherName,
                'last_name' => $this->lastName,
                'nomenclature_category_id' => $this->cat_id,
                'nomenclature_group_id' => $this->nomGroup_id,
                'nomenclature_rank_id' => $this->nomRank_id,
            ]);

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
        session()->flash('message', 'Post Deleted Successfully.');
    }
}
