<?php

namespace App\Http\Livewire;

use App\Models\NomenclatureCategory;
use App\Models\NomenclatureGroup;
use App\Models\NomenclatureRank;
use App\Models\Rank;
use App\Models\TblUser;
use Livewire\Component;
use App\Http\Livewire\Field;
use App\Models\TblReview;
class Review extends Component
{
    public $contacts, $date_of_review, $rank,$salary, $contact_id,$department,$ranks, $nomRank_number;
    public $updateMode = false;
    public $inputs = [];
    public $i = 1;
    public $cats;
    public $cat_id = 0;
    public $nomGroup_id = 0;
    public $nomRank_id =0;
    public $nomGroups;
    public $nomRanks;
    public $company;

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function add($i)
    {
        $i = $i + 1;
        $this->i = $i;
        array_push($this->inputs ,$i);
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function remove($i)
    {
        unset($this->inputs[$i]);
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function render()
    {
        $this->ranks = Rank::all();
        $this->cats = NomenclatureCategory::all();
        $this->user = $this->department->userID;
        $this->contacts = TblReview::where('seeker_id',$this->department->userID)->latest()->get();
        return view('livewire.review');
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    private function resetInputFields(){
        $this->date_of_review = '';
        $this->rank = '';
        $this->salary = '';
        $this->cat_id = '';
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function store()
    {

        $validatedDate = $this->validate([
            'date_of_review.0' => 'required',
            'rank.0' => 'required',
            'salary.0' => 'required',
            'date_of_review.*' => 'required',
            'rank.*' => 'required',
            'salary.*' => 'required',
        ],
            [
                'date_of_review.0.required' => 'date of review field is required',
                'rank.0.required' => 'rank field is required',
                'salary.0.required' => 'salary field is required',
                'date_of_review.*.required' => 'date of review field is required',
                'rank.*.required' => 'rank field is required',
                'salary.*.required' => 'salary field is required',
            ]
        );


        foreach ($this->date_of_review as $key => $value) {
            //  dd( $this->date_of_review[$key]);
            $arrayResult = explode('-', $this->date_of_review[$key]);
            TblReview::create([

                'date_of_review' => $this->date_of_review[$key],
                'rank_id' => $this->rank[$key],
                'nomenclature_category_id' => $this->cat_id,
                'nomenclature_group_id' => $this->nomGroup_id,
                'nomenclature_rank_id' => $this->nomRank_id,
                'salary' => $this->salary[$key],
                'seeker_id' => $this->department->userID,
                'organization_id' => $this->department->deptID,
                'year' => $arrayResult[0],
                'month' => $arrayResult[1],
                'day' => $arrayResult[2],
                'status' => 'PENDING',

            ]);
        }

//        $this->inputs = [];

        $this->resetInputFields();

        session()->flash('message', 'Staff Has Been Reviewed Successfully.');
    }

    public function cancel()
    {
        //$this->subDeptMode = false;

        $this->updateMode = false;
        $this->resetInputFields();
    }

    public function getNomGroup(){


        $this->nomGroups = NomenclatureGroup::where('nomenclature_category_id',$this->cat_id)->get();

    }


    public function getNomRank(){


        $this->nomRanks = NomenclatureRank::where('nomenclature_group_id',$this->nomGroup_id)->get();

    }

    public function edit($id)
    {

        $post = TblUser::where('userID',$id)->first();
//         dd($post);
        $this->User_id = $id;
        $this->rank_id = $post->rank;
        $this->nomenclature_rank = $post->nomenclature_rank;
        $this->ranks = Rank::get();

        $this->nomGroups = NomenclatureGroup::where('nomenclature_category_id',$this->cat_id)->get();
        $this->nomRanks = NomenclatureRank::where('nomenclature_group_id',$this->nomGroup_id)->get();



        $this->updateMode = true;
    }

}
