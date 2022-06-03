<?php

namespace App\Http\Livewire;

use App\Models\KycLevel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class CreateLevel extends Component
{
    public function render()
    {
        return view('livewire.create-level');
    }

    public function createLevel(Request $request) {
        $kycLevel = New KycLevel;

        $kycLevel->user_id = Auth::user()->first()->id;
        $kycLevel->level_name = $request->input('level-name');
        $kycLevel->id_types = $request->input('types');

        $kycLevel->save();

        return redirect()->back();
    }
}
