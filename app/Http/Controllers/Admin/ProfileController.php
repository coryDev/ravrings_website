<?php

namespace App\Http\Controllers\Admin;

use App\Components\User\Models\User;

class ProfileController extends AdminController
{
    public function index()
    {
        /**
         * @var User $currentUser
         */
        $currentUser = \Auth::user();

        view()->share('nav',$currentUser);

        return view('layouts.admin.profile.edit');
    }

    public function update()
    {
        $currentUser = \Auth::user();

        return redirect()->route('admin.profile')->withStatus(__('User successfully updated.'));
    }

    public function updatePassword()
    {
        $currentUser = \Auth::user();

        return redirect()->route('admin.profile')->withStatus(__('User successfully updated.'));
    }
}