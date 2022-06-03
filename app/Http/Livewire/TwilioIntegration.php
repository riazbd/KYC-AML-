<?php

namespace App\Http\Livewire;

use App\Models\TwilioIntegration as ModelTwilioIntegration;
use Illuminate\Http\Request;
use Livewire\Component;

class TwilioIntegration extends Component
{
    public function render()
    {
        return view('livewire.twilio-integration');
    }

    public function updateTwilio(Request $request, $id) {
        $twilio = ModelTwilioIntegration::where('id', $id)->first();

        $twilio->sid = $request->input('sid');
        $twilio->auth_token = $request->input('auth-token');
        $twilio->from_number = $request->input('from-number');

        $twilio->save();

        return redirect()->back();
    }
}
