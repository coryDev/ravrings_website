<?php

namespace App\Http\Controllers\Front;

use App\Models\Cate;
use App\Models\Product;
use App\Models\Merchant;
use App\User;

class HomeController extends FrontController
{
    public function index()
    {
        $categories = Cate::all();
        $data = array();
        foreach ($categories as $category) {
            $category_arr = explode('>', $category);

            if (count($category_arr) == 1) {
                array_push($data, $category);
            }
        }

        return view('welcome', ['cates' => $data]);
    }

    public function viewCategories()
    {
        $categories = Cate::all();
        $data = array();
        foreach ($categories as $category) {
            $category_arr = explode('>', $category);

            if (count($category_arr) == 1) {
                array_push($data, $category);
            }
        }

        return view('layouts.front.categories', ['cates' => $data]);
    }

    public function viewProducts()
    {
        $products = Product::inRandomOrder()->paginate(16);

        return view('layouts.front.products', ['products' => $products]);
    }    

    public function viewProductsByCate($cate)
    {
        $cateTitle = Cate::find($cate)->first()->title;
        $products = Product::where('google_product_category', 'like', '%' . $cateTitle . '%')->inRandomOrder()->paginate(16);

        return view('layouts.front.products', ['products' => $products]);
    }

    public function viewMerchants()
    {
        $merchants = Merchant::inRandomOrder()->paginate(16);

        return view('layouts.front.merchants', ['merchants' => $merchants]);
    }

    public function viewMerchantById($merchantId)
    {
        $merchants = Merchant::inRandomOrder()->paginate(16);

        return view('layouts.front.merchants', ['merchants' => $merchants]);
    }
}