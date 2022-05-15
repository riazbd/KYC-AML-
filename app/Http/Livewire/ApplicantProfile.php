<?php

namespace App\Http\Livewire;

use App\Models\Applicant;
use Carbon\Carbon;
use Livewire\Component;
use Illuminate\Http\Request;

class ApplicantProfile extends Component
{
    public function render()
    {
		$tokens = [];
		foreach(Applicant::where('access_token_creation_date', '<', Carbon::now()->subMinutes(2))->get() as $token) {
			// $token->access_token = null;
			// $token->save();
			array_push($tokens,$token->access_token);
		}
		
		// dd($tokens);
        return view('livewire.applicant-profile');
    }

    public function updateToken($id){
        $applicant = Applicant::where('applicant_unique_id', $id)->get();
        // dd($applicant);
        $token = $applicant->first()->applicant_unique_id;
        $applicant->first()->access_token = $token;
        $applicant->first()->access_token_creation_date = Carbon::now()->toDateTimeString();

        $applicant->first()->save();

        return redirect('/applicants/'.$applicant->first()->applicant_unique_id)
        ->with('applicant', $applicant->first()->id);
    }

    public function editProfile (Request $request, $id) {
        $profile = Applicant::where('applicant_unique_id', $id)->first()->applicantsProfile()->first();

        $profile->first_name = $request->input('first-name');
        $profile->middle_name = $request->input('middle-name');
        $profile->last_name = $request->input('last-name');
        $profile->country = $request->input('country');
        $profile->birth_country = $request->input('country-of-birth');
        $profile->state_of_birth = $request->input('state-of-birth');
        $profile->legal_name = $request->input('legal-name');
        $profile->phone = $request->input('phone');
        $profile->date_of_birth = $request->input('date-of-birth');
        $profile->nationality = $request->input('nationality');
        $profile->gender = $request->input('gender');

        $profile->save();

        return redirect()->back();
    }
}
