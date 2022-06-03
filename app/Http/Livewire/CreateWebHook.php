<?php

namespace App\Http\Livewire;

use App\Models\WebHook;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class CreateWebHook extends Component
{
    public function render()
    {
        return view('livewire.create-web-hook');
    }

    public function createHook (Request $request) {
        $hook = New WebHook;

        $hook->user_id =  Auth::user()->first()->id;
        $hook->hook_name =  $request->input('hook-name');
        $hook->reciever =  $request->input('receiver');
        $hook->target =  $request->input('target');
        $hook->applicant_type =  $request->input('applicant-type');
        $hook->types =  $request->input('types');
        $hook->will_resend =  $request->input('resend');

        $hook->save();

        return redirect()->back();

    }
}
