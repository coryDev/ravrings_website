<?php

namespace App\Http\Controllers\Merchant;

use Illuminate\Http\Request;
use App\Components\User\Models\User;
use App\Models\Feed;
use App\Models\Merchant;
use App\Models\Product;
use GuzzleHttp\Client;

class SettingsController extends MerchantController
{
    public function index()
    {
        $currentMerchant = Merchant::where('user_id', \Auth::user()->id)->first();

        return view('layouts.merchant.settings.edit', ['merchant' => $currentMerchant]);
    }

    public function phase($feedUrl)
    {

    }

    public function update(Request $request)
    {
        if ($request->has('feed_url')) {
            
            $merchant_id = \Auth::user()->id;

            Product::where('merchant_id', $merchant_id)->delete();

            $Data = str_getcsv(file_get_contents($request->input('feed_url')), "\n");

            $count = 0;

            $fields_arr = array();

            foreach($Data as &$Row)
            {
                $products_arr = str_getcsv($Row, "\t");

                if ($count == 0) {
                    
                    $fields_arr = $products_arr;
                } else {

                    $products_new_arr = array();

                    for ($i = 0; $i < count($products_arr); $i++) {

                        $field = trim($fields_arr[$i]);    
                        $products_new_arr[$field] = trim($products_arr[$i]);
                    }

                    $products_new_arr['merchant_id'] = $merchant_id;

                    Product::create($products_new_arr);
                }
                $count++;
            }
        } else {
            $params_arr = $request->all();
            $currentMerchant = Merchant::where('user_id', \Auth::user()->id)->first();
    
            $currentMerchant->update($params_arr);
        }

        return redirect()->route('merchant.settings')->withStatus(__('Merchant Setting successfully updated.'));
    }
}