<?php

namespace App\Http\Controllers\Merchant;

use App\Components\User\Models\User;

class ProfileController extends MerchantController
{
    public function index()
    {
        /**
         * @var User $currentUser
         */
        $currentUser = \Auth::user();

        view()->share('nav',$currentUser);

        return view('layouts.merchant.profile.edit');
    }

    public function update()
    {
        $currentUser = \Auth::user();

        return redirect()->route('merchant.profile')->withStatus(__('User successfully updated.'));
    }

    public function updatePassword()
    {
        $currentUser = \Auth::user();

        return redirect()->route('merchant.profile')->withStatus(__('User successfully updated.'));
    }
}