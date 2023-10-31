<?php

namespace App\Http\Livewire;

use App\Models\Seeker;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use App\Http\Livewire\Field;
use App\Models\OrgAppraisal;
class MydeptGoals extends Component
{
    public $contacts, $year, $month,$salary, $contact_id,$department;
    public $updateMode = false;
    public $inputs = [];
    public $i = 1;

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
    {  $org= Seeker::find(Auth::user()->m_id);
        $this->contacts = OrgAppraisal::where('organization_id',$org->organization_id)->get();
        return view('livewire.mydept-goals');
    }
}
