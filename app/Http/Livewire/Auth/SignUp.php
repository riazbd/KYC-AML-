<?php

namespace App\Http\Livewire\Auth;

use App\Models\AccountDetail;
use App\Models\TwilioIntegration;
use Livewire\Component;
use App\Models\User;
use App\Models\UserProfile;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class SignUp extends Component
{
    public $name = '';
    public $email = '';
    public $password = '';

    protected $rules = [
        'name' => 'required|min:3',
        'email' => 'required|email:rfc,dns|unique:users',
        'password' => 'required|min:6'
    ];

    public function mount() {
        if(auth()->user()){
            redirect('/dashboard');
        }
    }

    public function register() {
        $this->validate();
        $user = User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => Hash::make($this->password)
        ]);


        auth()->login($user);

        $userProfile = New UserProfile;
        $accountDetail = New AccountDetail;
        $twilioIntegration = New TwilioIntegration;

        $userProfile->user_id = Auth::user()->id;

        $accountDetail->user_id = Auth::user()->id;
        $accountDetail->legal_mail = Auth::user()->email;

        $twilioIntegration->user_id = Auth::user()->id;
        $twilioIntegration->sid = '';
        $twilioIntegration->auth_token = '';
        $twilioIntegration->from_number = '';


        $userProfile->save();
        $accountDetail->save();
        $twilioIntegration->save();

        return redirect('/dashboard');
    }

    public function render()
    {
        return view('livewire.auth.sign-up');
    }
}
