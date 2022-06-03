<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserProfile extends Component
{
    public function render()
    {
        return view('livewire.user-profile');
    }

    public function editProfile(Request $request) {
        $profile = Auth::user()->userProfile()->first();
        $user = Auth::user()->first();

        $profile->first_name = $request->input('first-name');
        $profile->last_name = $request->input('last-name');

        $user->password = Hash::make($request->input('password'));

        $profile->save();
        $user->save();

        return redirect()->back();
    }
}
