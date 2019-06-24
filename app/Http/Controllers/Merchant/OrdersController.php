<?php

namespace App\Http\Controllers\Merchant;

use App\Components\User\Models\User;

class OrdersController extends MerchantController
{
    public function index()
    {
        return view('layouts.merchant.orders.index', ['users' => []]);
    }

    /**
     * Show the form for creating a new user
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('layouts.merchant.orders.create');
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

        return redirect()->route('merchant.orders')->withStatus(__('User successfully created.'));
    }

    /**
     * Show the form for editing the specified user
     *
     * @param  \App\User  $user
     * @return \Illuminate\View\View
     */
    public function edit()
    {
        return view('layouts.merchant.orders.edit', compact('user'));
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

        return redirect()->route('merchant.orders')->withStatus(__('User successfully updated.'));
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

        return redirect()->route('merchant.orders')->withStatus(__('User successfully deleted.'));
    }
}