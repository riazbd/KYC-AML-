<?php

namespace App\Http\Livewire;

use App\Models\Applicant;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ReviewPanel extends Component
{
    public function render()
    {
        if (Auth::user()->id == 1){
            $applicants = Applicant::all();
        }else {
            $applicants = Applicant::where('user_id', Auth::user()->id)->get();
        }

        return view('livewire.review-panel')->with('applicants', $applicants);
    }
}
