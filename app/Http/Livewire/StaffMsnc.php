<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\TblUser;
use App\Models\TblRank;
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
            TblUser::orderBy('lastName')->paginate($this->perPage):
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
//dd(  $this->userID);
 $profile = TblUser::where('userID',$this->userID)->first();
 //dd( $profile);
        //TblUser::update(['userID' => $this->User_id], [
        $profile->firstName = $this->firstName;
         $profile->otherName = $this->otherName;
          $profile->lastName = $this->lastName;
           $profile->rank_id = $this->rank_id;
         
          
            $profile->save();
           
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
        TblUser::where('userID',$id)->delete();
        session()->flash('message', 'Staff Deleted Successfully.');
    }
}
