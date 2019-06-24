<?php

namespace App\Http\Controllers\Merchant;

use App\Components\Core\Menu\MenuItem;
use App\Components\Core\Menu\MenuManager;
use App\Components\User\Models\User;

class FrontController extends MerchantController
{
    public function displaySPA()
    {
        /**
         * @var User $currentUser
         */
        $currentUser = \Auth::user();

        view()->share('nav',$currentUser);

        return view('layouts.merchant');
    }
}