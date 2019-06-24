<?php

namespace App\Http\Controllers\Admin;

use App\Components\User\Models\User;
use App\Models\Product;

class ProductsController extends AdminController
{
    public function index()
    {
        $data = Product::paginate(15);
        return view('layouts.admin.products.index', ['products' => $data]);
    }

    /**
     * Show the form for creating a new user
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('layouts.admin.products.create');
    }

    /**
     * Store a newly created user in storage
     *
     * @param  \App\Http\Requests\UserRequest  $request
     * @param  \App\User  $model
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(UserRequest $request)
    {
        // $model->create($request->merge(['password' => bcrypt($request->get('password'))])->all());

        return redirect()->route('admin.products')->withStatus(__('New product successfully created.'));
    }

    /**
     * Show the form for editing the specified user
     *
     * @param  \App\User  $user
     * @return \Illuminate\View\View
     */
    public function edit()
    {
        return view('layouts.admin.products', compact('user'));
    }

    /**
     * Update the specified user in storage
     *
     * @param  \App\Http\Requests\UserRequest  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UserRequest $request)
    {
        // $user->update(
        //     $request->merge(['password' => bcrypt($request->get('password'))])
        //         ->except([$request->get('password') ? '' : 'password']
        // ));

        return redirect()->route('admin.products')->withStatus(__('Product successfully updated.'));
    }

    /**
     * Remove the specified user from storage
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy()
    {
        // $user->delete();

        return redirect()->route('admin.products')->withStatus(__('Product successfully deleted.'));
    }
}