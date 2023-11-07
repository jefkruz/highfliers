<?php

namespace App\Http\Livewire;

use App\Models\TblRank;
use App\Models\TblUser;
use Livewire\Component;

class Deptstaff extends Component
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
//    public function render()
//    {
//        return view('livewire.deptstaff');
//    }

    public function render()
    {
        //return view('livewire.staffrank');

        $this->emit('userStore');
        //return view('livewire.staff-msnc');
//dd($this->department);
        return view('livewire.staff-msnc',['users' => $this->search === null ?
            TblUser::where('deptID',  $this->department->deptID )->orderBy('lastName')->paginate($this->perPage):
            TblUser::where('deptID',  $this->department->deptID )->
            where('firstName', 'like', '%' . $this->search . '%')

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
         //dd($post);
        $this->User_id = $id;
        $this->firstName = $post->firstName;
        $this->otherName = $post->otherName;
        $this->lastName = $post->lastName;
        $this->rank_id = $post->rank_id;
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

//($this->rank);
//        $post = TblRank::where('rankID',$this->rankID)->first();
//
//        $post->rank = $this->rank;
//        $post->save();
        $this->validate([
            'firstName' => 'required',
//            'otherName' => 'required',
            'lastName' => 'required',
            'rank' => 'required',
        ]);
          $profile1 =TblUser::where('userID',$this->User_id) ->first();   
          //dd($profile1->id);
            $profile = TblUser::find($profile1->id) ->update([
             'firstName' => $this->firstName,
              'lastName' => $this->lastName,
           'rank_id' => $this->rank
        ]);
        
       //d( $profile1);
    //    $profile->firstName = $this->firstName;
      //  $profile->otherName = $this->otherName;
        //$profile->lastName=$this->lastName;
        //$profile->rank_id = $this->rank_id;
        //$profile->save();
       // TblUser::updateOrCreate(['id' => $this->User_id], [
//            'firstName' => $this->firstName,
//            'otherName' => $this->otherName,
//            'lastName' => $this->lastName,
//            'rank_id' => $this->rank,
//        ]);


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
        //TblUser::where('rankID',$id)->delete();
        session()->flash('message', 'Post Deleted Successfully.');
    }
}
