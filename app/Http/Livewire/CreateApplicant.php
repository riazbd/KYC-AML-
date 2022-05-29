<?php

namespace App\Http\Livewire;

use Illuminate\Http\Request;
use App\Models\Applicant;
use App\Models\ApplicantsProfile;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Illuminate\Support\Str;

class CreateApplicant extends Component
{
    public function render()
    {
        return view('livewire.create-applicant');
    }

    public function createApplicant (Request $request) {
        $applicant = New Applicant;
        $applicantProfile = New ApplicantsProfile;
        $applicantProfile->first_name = $request->input('first-name');
        $applicantProfile->middle_name = $request->input('middle-name');
        $applicantProfile->last_name = $request->input('last-name');

        $applicant->user_id = Auth::user()->id;
        $applicant->created_for = Auth::user()->email;
        $applicantUniqueId = Str::random(20);
        $applicant->applicant_unique_id = $applicantUniqueId;

        if ($request->input('external-id') == "") {
            $externalId = Str::random(25);
            $applicant->applicant_extrnal_unique_id = $externalId;
        }
        else {
            $applicant->applicant_extrnal_unique_id = $request->input('external-id');
        }

        $applicant->kyc_level_id = $request->input('kyc-level');

        $applicant->save();
        $applicantProfile->applicant_id = $applicant->id;
        $applicantProfile->save();


        return redirect('/applicants/'.$applicantUniqueId)
            ->with('applicant', $applicant->id)
            ->with('applicantProfile', $applicantProfile);
    }

    public function editApplicant (Request $request, $id){
        $applicant = Applicant::where('applicant_unique_id', $id)->get();
        $applicant->first()->email = $request->input('email');
        $applicant->first()->save();

        return redirect()->back();
    }
}
