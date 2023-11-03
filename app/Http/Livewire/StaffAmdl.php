<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Seeker;
use App\Models\Rank;

class StaffAmdl extends Component
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
       // return view('livewire.staff-amdl');
        return view('livewire.staff-amdl',['users' => $this->search === null ?
            Seeker::where('organization_id',$this->department->id)->orderBy('first_name')->paginate($this->perPage):
            Seeker::where('organization_id',$this->department->id)->where('first_name', 'like', '%' . $this->search . '%')
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
        $this->nomenclature_rank = $post->nomenclature_rank;
        $this->ranks = Rank::get();

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
        $this->validate([
            'firstName' => 'required',
//            'otherName' => 'required',
            'lastName' => 'required',
            'rank' => 'required',
//            'nomenclature_rank' => 'required',
        ]);

        Seeker::updateOrCreate(['id' => $this->User_id], [
            'first_name' => $this->firstName,
            'other_name' => $this->otherName,
            'last_name' => $this->lastName,
            'rank_id' => $this->rank,
//            'nomenclature_rank' => $this->nomenclature_rank,
        ]);


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
