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

        // $validatedData = $request->validate([
        //  'front-file' => 'required|csv,txt,xlx,xls,pdf|max:2048',
        //  'back-file' => 'required|csv,txt,xlx,xls,pdf|max:2048',

        // ]);

        // $frontFileName = $request->file('front-file')->getClientOriginalName();
        // $backFileName = $request->file('back-file')->getClientOriginalName();

        $frontFilePath = $request->file('front-side')->store('public/files/');
        $backFilePath = $request->file('back-side')->store('public/files/');
        $idType = $request->input('document-type');
        $applicantID = $request->input('applicant-id');


        $save = new ApplicantsDocument;
        $applicant = Applicant::where('applicant_unique_id', $applicantID)->first();
        // $save->name = $name;
        // dd($applicant->applicantsProfile()->first()->id);
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
    				// 'filename' => $image_org,
    				'Mime-Type'=> Storage::mimeType($frontFilePath),
    				'contents' => fopen( Storage::path($frontFilePath), 'r' ),
    			],

                [
    				'name'     => 'image',
    				// 'filename' => $image_org,
    				'Mime-Type'=> Storage::mimeType($backFilePath),
    				'contents' => fopen(Storage::path($backFilePath), 'r' ),
    			],
    		]
    	]);

        $responseBody = json_decode($response->getBody());

        // dd($responseBody);
        if ($responseBody->data[0]->message == 'Successfully Read') {
            $applicantProfile = $applicant->applicantsProfile()->first();
            $existingLatestDoc = $applicantProfile->applicantsDocuments()->latest('created_at')->first();
            $applicantProfile->first_name = $responseBody->data[0]->first_name;
            $applicantProfile->middle_name = '';
            $applicantProfile->last_name = $responseBody->data[0]->last_name;
            $applicantProfile->country = $responseBody->data[0]->country;
            $applicantProfile->nationality = $responseBody->data[0]->nationality;
            $applicantProfile->date_of_birth = $responseBody->data[0]->date_of_birth;
            $applicantProfile->gender = $responseBody->data[0]->gender;

            $existingLatestDoc->doc_no = $responseBody->data[0]->id_no;
            $existingLatestDoc->first_name = $responseBody->data[0]->first_name;
            $existingLatestDoc->middle_name = '';
            $existingLatestDoc->last_name = $responseBody->data[0]->last_name;
            $existingLatestDoc->date_of_birth = $responseBody->data[0]->date_of_birth;
            $existingLatestDoc->valid_until = $responseBody->data[0]->exp_date;
            $applicant->is_approved = 1;
            $applicantProfile->save();
            $existingLatestDoc->save();
            $applicant->save();

        }

        else {
            $applicant->is_approved = 0;
            $applicant->save();
        }




        // return redirect('file-upload')->with('status', 'File Has been uploaded successfully in laravel 8');
        // session()->flash('message', 'File successfully Uploaded.');
        return redirect('/upload-feedback')->with('message', $responseBody->data[0]->message);

    }
}
