<?php

namespace App\Http\Livewire;

use App\Models\Rank;
use Livewire\Component;
use App\Models\NomenclatureCategory;

class NomRank extends Component
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
        return view('livewire.nom-rank',['posts' => $this->search === null ?
            NomenclatureCategory::orderBy('name')->paginate($this->perPage):
            NomenclatureCategory::where('name', 'like', '%' . $this->search . '%')

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
//dd($validatedDate['rank']);
        NomenclatureCategory::create([
            'name' => $validatedDate['rank']]);

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
        $post = NomenclatureCategory::where('id',$id)->first();
        $this->rankID = $id;
        $this->rank = $post->name;


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

        $post = NomenclatureCategory::where('id',$this->rankID)->first();

        $post->name = $this->rank;
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
        NomenclatureCategory::where('id',$id)->delete();
        session()->flash('message', 'Post Deleted Successfully.');
    }
}
