<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\File;
use Livewire\WithFileUploads;
use App\Models\ApplicantsDocument;
use App\Models\Applicant;
use App\Models\ApplicantsProfile;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Storage;

class UploadDocuments extends Component
{
    public function render()
    {
        return view('upload-documents')->layout('livewire.layouts.upload');
    }

    public function store(Request $request)
    {
        if($request->input('National-Id')) {
            $frontFilePath = $request->file('nid-front-side')->store('public/files/');
            $backFilePath = $request->file('nid-back-side')->store('public/files/');
            $idType = $request->input('National-Id');
            $applicantID = $request->input('applicant-id');


            $save = new ApplicantsDocument;
            $applicant = Applicant::where('applicant_unique_id', $applicantID)->first();
            $save->applicants_profile_id = $applicant->applicantsProfile()->first()->id;
            $save->back_path = $backFilePath;
            $save->front_path = $frontFilePath;
            $save->id_type = $idType;
            $save->save();

            // API CALL
            $client = new Client();
            $url = "http://207.148.19.171:5555/card-info-extractor";

            $response = $client->request('POST', $url, [
                'multipart' => [
                    [
                        'name'     => 'image-front',

                        'Mime-Type'=> Storage::mimeType($frontFilePath),
                        'contents' => fopen( Storage::path($frontFilePath), 'r' ),
                    ],

                    [
                        'name'     => 'image',

                        'Mime-Type'=> Storage::mimeType($backFilePath),
                        'contents' => fopen(Storage::path($backFilePath), 'r' ),
                    ],
                ]
            ]);

            $responseBody = json_decode($response->getBody());


            if ($responseBody->data[0]->message == 'Successfully Read') {
                $applicantProfile = $applicant->applicantsProfile()->first();
                // $existingLatestDoc = $applicantProfile->applicantsDocuments()->latest('created_at')->first();
                $applicantProfile->first_name = $responseBody->data[0]->first_name;
                $applicantProfile->middle_name = '';
                $applicantProfile->last_name = $responseBody->data[0]->last_name;
                $applicantProfile->country = $responseBody->data[0]->country;
                $applicantProfile->nationality = $responseBody->data[0]->nationality;
                $applicantProfile->date_of_birth = $responseBody->data[0]->date_of_birth;
                $applicantProfile->gender = $responseBody->data[0]->gender;

                $save->doc_no = $responseBody->data[0]->id_no;
                $save->first_name = $responseBody->data[0]->first_name;
                $save->middle_name = '';
                $save->last_name = $responseBody->data[0]->last_name;
                $save->date_of_birth = $responseBody->data[0]->date_of_birth;
                $save->valid_until = $responseBody->data[0]->exp_date;
                $applicant->is_approved = 1;
                $applicantProfile->save();
                $save->save();
                $applicant->save();

            }

            else {
                $applicant->is_approved = 0;
                $applicant->save();
            }
        }

        if ($request->input('Passport')) {
            $frontFilePath = $request->file('passport-front-side')->store('public/files/');
            $idType = $request->input('Passport');
            $applicantID = $request->input('applicant-id');


            $save = new ApplicantsDocument;
            $applicant = Applicant::where('applicant_unique_id', $applicantID)->first();

            $save->applicants_profile_id = $applicant->applicantsProfile()->first()->id;

            $save->front_path = $frontFilePath;
            $save->id_type = $idType;
            $save->save();

            // API CALL
            $client = new Client();
            $url_passport = "http://207.148.19.171:5555/passport-info-extractor";

            $response = $client->request('POST', $url_passport, [
                'multipart' => [
                    [
                        'name'     => 'front-image',

                        'Mime-Type'=> Storage::mimeType($frontFilePath),
                        'contents' => fopen( Storage::path($frontFilePath), 'r' ),
                    ],

                ]
            ]);

            $responseBody = json_decode($response->getBody());


            if ($responseBody->data[0]->message == 'Successfully Read') {
                $applicantProfile = $applicant->applicantsProfile()->first();
                $applicantProfile->first_name = $responseBody->data[0]->first_name;
                $applicantProfile->middle_name = '';
                $applicantProfile->last_name = $responseBody->data[0]->last_name;
                $applicantProfile->country = $responseBody->data[0]->country;
                $applicantProfile->nationality = $responseBody->data[0]->nationality;
                $applicantProfile->date_of_birth = $responseBody->data[0]->date_of_birth;
                $applicantProfile->gender = $responseBody->data[0]->gender;

                $save->doc_no = $responseBody->data[0]->id_no;
                $save->first_name = $responseBody->data[0]->first_name;
                $save->middle_name = '';
                $save->last_name = $responseBody->data[0]->last_name;
                $save->date_of_birth = $responseBody->data[0]->date_of_birth;
                $save->valid_until = $responseBody->data[0]->exp_date;
                $applicant->is_approved = 1;
                $applicantProfile->save();
                $save->save();
                $applicant->save();

            }

            else {
                $applicant->is_approved = 0;
                $applicant->save();
            }
        }

        if($request->input('Selfie')) {
            $frontFilePath = $request->file('selfie')->store('public/files/');
            $idType = $request->input('Selfie');
            $applicantID = $request->input('applicant-id');


            $save = new ApplicantsDocument;
            $applicant = Applicant::where('applicant_unique_id', $applicantID)->first();

            $save->applicants_profile_id = $applicant->applicantsProfile()->first()->id;
            $save->front_path = $frontFilePath;
            $save->id_type = $idType;
            $save->save();
        }

        if($request->input('email')) {
            $applicant = Applicant::where('applicant_unique_id', $applicantID)->first();

            $applicant->email = $request->input('email');

            $applicant->save();
        }


        return redirect('/upload-feedback')->with('message', $responseBody->data[0]->message);

    }
}
