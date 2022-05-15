<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ApplicantDocumentFeedback extends Component
{
    public function render()
    {
        return view('livewire.applicant-document-feedback')->layout('livewire.layouts.upload');
    }
}
