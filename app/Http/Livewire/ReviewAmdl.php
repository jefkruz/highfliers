<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Http\Livewire\Field;
use App\Models\Review;
use App\Models\Rank;
class ReviewAmdl extends Component
{
    public $contacts, $date_of_review, $rank,$salary, $contact_id,$department,$ranks;
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
        $this->ranks = Rank::all();
        $this->contacts = Review::where('seeker_id',$this->department->id)->get();
        return view('livewire.review-amdl');
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
            Review::create([

                'date_of_review' => $this->date_of_review[$key],
                'rank_id' => $this->rank[$key],
                'salary' => $this->salary[$key],
                'seeker_id' => $this->department->id,
                'organization_id' => $this->department->organization_id,
                'year' => $arrayResult[0],
                'month' => $arrayResult[1],
                'day' => $arrayResult[2],

            ]);
        }

        $this->inputs = [];

        $this->resetInputFields();

        session()->flash('message', 'Contact Has Been Created Successfully.');
    }
}
