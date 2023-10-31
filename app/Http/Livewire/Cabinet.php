<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Cabinet as db;
use App\Models\Admin;
use Illuminate\Support\Facades\Auth;
use Livewire\WithPagination;
class Cabinet extends Component
{
    use WithPagination;
    public $users,$search,$i=0,$request_id,$user_id;
    //public $projects;
    protected $queryString = ['search'];
    public function render()
    {
        $this->users = Admin::where('organization_id',Auth::user()->organization_id)->
            where('role_id',6)->get();
        return view('livewire.cabinet',[
            'cabinets' => $this->search === null ?
                db::where('organization_id',Auth::user()->organization_id)->latest()->paginate(12):
                db::where('organization_id',Auth::user()->organization_id)
                    ->where('name', 'like', '%' . $this->search . '%')->latest()->paginate(12)

        ]);
    }


    public function create($id)
    {
        $student = db::findOrFail($id);
        $this->request_id = $id;
        //$slug = $student->slug;


    }
    public function update()
    {
       // dd('nn');
        $this->validate([
            'user_id' => 'required',


        ]);
//dd($this->request_id);
        db::where('id',$this->request_id) ->update( [
            'user_id' => $this->user_id

        ]);
        session()->flash('message', 'Request Has Been Updated Successfully.');
    }

}
