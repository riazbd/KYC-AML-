<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Applicant;
use Illuminate\Support\Facades\Auth;

class Applicants extends Component
{
    public function render()
    {
        if (Auth::user()->id == 1){
            $applicants = Applicant::all();
        }else {
            $applicants = Applicant::where('user_id', Auth::user()->id)->get();
        }


        // $applicants = Applicant::with('applicantsProfile')->with('applicantsProfile.applicantsDocuments')->get();
        return view('livewire.applicants')->with('applicants', $applicants);
    }

    public function editValidation ($id) {
        $applicant = Applicant::where('applicant_unique_id', $id)->first();

        if ($applicant->is_approved == 1) {
            $applicant->is_approved = 0;
        }
        else{
            $applicant->is_approved = 1;
        }

        $applicant->save();

        return redirect()->back();
    }

    public function approveDocument ($id) {
        $applicant = Applicant::where('applicant_unique_id', $id)->first();

        $applicant->is_approved = 1;

        $applicant->save();

        return redirect()->back();
    }

    public function declineDocument ($id) {
        $applicant = Applicant::where('applicant_unique_id', $id)->first();

        $applicant->is_approved = 0;

        $applicant->save();

        return redirect()->back();
    }

    public function editStatus ($id) {
        $applicant = Applicant::where('applicant_unique_id', $id)->first();

        if ($applicant->status == 1) {
            $applicant->status = 0;
        }
        else{
            $applicant->status = 1;
        }

        $applicant->save();

        return redirect()->back();
    }

    public function destroy ($id) {
        Applicant::where('applicant_unique_id', $id)->delete();

        return redirect()->back();
    }

}
