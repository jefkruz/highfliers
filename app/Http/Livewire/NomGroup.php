<?php

namespace App\Http\Livewire;

use App\Models\NomenclatureCategory;
use App\Models\NomenclatureGroup;
use Livewire\Component;

class NomGroup extends Component
{
    public $perPage = 12,$total_monthly =0,$rankID,$search,$rank,$group;
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
        return view('livewire.nom-group',['posts' => $this->search === null ?
            NomenclatureGroup::where('nomenclature_category_id',$this->group->id)->orderBy('name')->paginate($this->perPage):
            NomenclatureGroup::where('nomenclature_category_id',$this->group->id)->where('name', 'like', '%' . $this->search . '%')

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
        //$cart=
        NomenclatureGroup::create([
            'name' => $validatedDate['rank'],
            'nomenclature_category_id' => $this->group->id
        ]);

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
        $post = NomenclatureGroup::where('id',$id)->first();
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

        $post = NomenclatureGroup::where('id',$this->rankID)->first();

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
        NomenclatureGroup::where('id',$id)->delete();
        session()->flash('message', 'Post Deleted Successfully.');
    }
}
