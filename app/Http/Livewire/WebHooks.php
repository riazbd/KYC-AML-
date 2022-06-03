<?php

namespace App\Http\Livewire;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class WebHooks extends Component
{
    public function render()
    {
        return view('livewire.web-hooks');
    }

    public function updateHook(Request $request, $id) {
        $hook = Auth::user()->webHooks()->where('id', $id)->first();

        // $hook->user_id =  Auth::user()->first()->id;
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
