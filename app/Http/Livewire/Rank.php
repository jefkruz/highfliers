<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\TblRank;
class Rank extends Component
{
    public $perPage = 12,$total_monthly =0,$rankID,$search,$rank;
    protected $queryString = ['search'];
    public $updateMode = false;
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
        //return view('livewire.rank');
        return view('livewire.rank',['posts' => $this->search === null ?
            TblRank::orderBy('rank')->paginate($this->perPage):
            TblRank::where('rank', 'like', '%' . $this->search . '%')

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

        TblRank::create($validatedDate);

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
        $post = TblRank::where('id',$id)->first();
        $this->rankID = $id;
        $this->rank = $post->rank;


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
        $validatedDate = $this->validate([
            'rank' => 'required',

        ]);

        $post = TblRank::where('id',$this->rankID)->first();

        $post->rank = $this->rank;
        $post->save();
//        \DB::table('db_msnc2.tbl_ranks')
//            ->where('rankID',$this->rankID)
//            ->update(['rank' =>$this->rank]);


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
        TblRank::where('id',$id)->delete();
        session()->flash('message', 'Post Deleted Successfully.');
    }
}
