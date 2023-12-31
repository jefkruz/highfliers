<?php

namespace App\Http\Livewire;

use App\Models\Rank;
use App\Models\SubDepartment;
use Livewire\Component;
use App\Models\TblUser;
use App\Models\TblRank;
use App\Models\NomenclatureCategory;

use App\Models\NomenclatureRank;
use App\Models\NomenclatureGroup;
class StaffMsnc extends Component
{
    public $perPage = 12,$total_monthly =0,$User_id,$showDiv,$search,$department,$firstName,$otherName,$lastName,$rank_id,$nomenclature_rank;
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

    public function getCompanies(){

        if($this->company == 'rank'){
           // $this->ranks = Rank::get();
            unset($this->conpany);

            $this->station = 0;

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
        //return view('livewire.staff-msnc');

        return view('livewire.staff-msnc',['users' => $this->search === null ?
            TblUser::where('mission_station_id','1')->

            orderBy('lastName')->paginate($this->perPage):
            TblUser::where('firstName', 'like', '%' . $this->search . '%')
            ->orWhere('otherName', 'like', '%' . $this->search . '%')
            ->orWhere('lastName', 'like', '%' . $this->search . '%')
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

        TblUser::create($validatedDate);

        session()->flash('message', 'Post Created Successfully.');

        $this->resetInputFields();
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function edit($id)
    {

        $post = TblUser::where('userID',$id)->first();
       // dd($post);
        $this->userID = $id;
        $this->firstName = $post->firstName;
        $this->otherName = $post->otherName;
        $this->lastName = $post->lastName;
        $this->rank_id = $post->rank_id;
        $this->nomenclature_rank = $post->nomenclature_rank;
        $this->ranks = TblRank::get();

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
//        $this->validate([
//            'firstName' => 'required',
////            'otherName' => 'required',
//            'lastName' => 'required',
//            'rank' => 'required',
////            'nomenclature_rank' => 'required',
//        ]);
//dd(  $this->userID);
        if($this->company == 'rank') {
            $profile1 = TblUser::where('userID', $this->User_id)->first();
            //dd($profile1->id);
            $profile = TblUser::find($profile1->id)->update([
                'firstName' => $this->firstName,
                'lastName' => $this->lastName,
                'rank_id' => $this->rank
            ]);
        }
        if($this->company == 'nomenclature') {
            $profile1 = TblUser::where('userID', $this->User_id)->first();
            //dd($profile1->id);
            $profile = TblUser::find($profile1->id)->update([
                'firstName' => $this->firstName,
                'lastName' => $this->lastName,

                'nomenclature_category_id' => $this->cat_id,
                'nomenclature_group_id' => $this->nomGroup_id,
                'nomenclature_rank_id' => $this->nomRank_id,
            ]);
        }
           // 'nomenclature_rank' => $this->nomenclature_rank,
        //]);


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
    //dd('bbb');
        TblUser::find($id)->delete();
        session()->flash('message', 'Staff Deleted Successfully.');
    }
}
