<?php

namespace App\Http\Controllers\Admin;

use App\Components\User\Models\User;

class VisitsController extends AdminController
{
    public function index()
    {
        /**
         * @var User $currentUser
         */
        $currentUser = \Auth::user();

        view()->share('nav',$currentUser);

        return view('layouts.admin.visits.edit');
    }

    public function phase()
    {
        
        // $file = file_get_contents('https://www.skullcap.com/datafiles/skullcap.txt', FILE_USE_INCLUDE_PATH);
        // echo $file;
        if ($fh = fopen('https://www.skullcap.com/datafiles/skullcap.txt', 'r')) {
            
            while (!feof($fh)) {

                $line = fgets($fh);
                $str_arr = preg_split ("/\,/", $line);
                print_r($str_arr);

                echo '<br />---------<br />';
            }

            fclose($fh);
        }
    }

    public function update()
    {
        $currentUser = \Auth::user();

        return redirect()->route('admin.visits')->withStatus(__('User successfully updated.'));
    }
}