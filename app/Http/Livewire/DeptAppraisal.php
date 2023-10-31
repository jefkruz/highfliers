<?php

namespace App\Http\Livewire;

use App\Models\Seeker;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use App\Http\Livewire\Field;
use App\Models\OrgAppraisal;
class DeptAppraisal extends Component
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
    {
        $org= Seeker::find(Auth::user()->m_id);
        $this->contacts = OrgAppraisal::where('organization_id',$org->organization_id)->latest()->get();
        return view('livewire.dept-appraisal');
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    private function resetInputFields(){
        $this->year = '';
        $this->month = '';

    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function store()
    {
        $validatedDate = $this->validate([
            'year.0' => 'required',
            'month.0' => 'required',

            'year.*' => 'required',
            'month.*' => 'required',

        ],
            [
                'year.0.required' => 'date of review field is required',
                'month.0.required' => 'rank field is required',

                'year.*.required' => 'date of review field is required',
                'month.*.required' => 'rank field is required',

            ]
        );
        $org= Seeker::find(Auth::user()->m_id);
       // dd($org);
        foreach ($this->year as $key => $value) {
            OrgAppraisal::create([

                'month' => $this->month[$key],
                'year' => $this->year[$key],

                'organization_id' => $org->organization_id
            ]);
        }

        $this->inputs = [];

        $this->resetInputFields();

        session()->flash('message', 'Goal Has Been Created Successfully.');
    }
}
