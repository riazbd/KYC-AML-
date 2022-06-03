<?php

namespace App\Http\Livewire;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class AccountDetail extends Component
{
    public function render()
    {
        return view('livewire.account-detail');
    }

    public function editDetail (Request $request) {
        $accountDetail = Auth::user()->accountDetail()->first();

        $accountDetail->account_name = $request->input('account-name');
        $accountDetail->public_business_name = $request->input('public-business-name');
        $accountDetail->company_number = $request->input('company-number');
        $accountDetail->country = $request->input('country');
        $accountDetail->street1 = $request->input('street');
        $accountDetail->street2 = $request->input('street2');
        $accountDetail->city = $request->input('city');
        $accountDetail->zip = $request->input('zip');
        $accountDetail->legal_mail = $request->input('legal-mail');
        $accountDetail->business_website = $request->input('business-website');
        $accountDetail->is_regulated = $request->input('company-regulations');

        $accountDetail->save();

        return redirect()->back();

    }
}
