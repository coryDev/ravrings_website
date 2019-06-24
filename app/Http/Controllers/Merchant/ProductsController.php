<?php

namespace App\Http\Controllers\Merchant;

use App\Models\Product;

class ProductsController extends MerchantController
{
    public function index()
    {
        $data = Product::paginate(15);
        return view('layouts.merchant.products.index', ['products' => $data]);
    }

    public function create()
    {
        return view('layouts.merchant.products.create');
    }

    public function store(UserRequest $request)
    {
        // $model->create($request->merge(['password' => bcrypt($request->get('password'))])->all());

        return redirect()->route('merchant.products')->withStatus(__('New product successfully created.'));
    }

    public function edit()
    {
        return view('layouts.merchant.products', compact('product'));
    }

    public function update(UserRequest $request)
    {
        // $user->update(
        //     $request->merge(['password' => bcrypt($request->get('password'))])
        //         ->except([$request->get('password') ? '' : 'password']
        // ));

        return redirect()->route('merchant.products')->withStatus(__('Product successfully updated.'));
    }

    public function destroy()
    {
        // $user->delete();

        return redirect()->route('merchant.products')->withStatus(__('Product successfully deleted.'));
    }

    
}