<?php

namespace App\Http\Controllers\Admin;

use App\Components\User\Models\User;

class MerchantsController extends AdminController
{
    public function index()
    {
        return view('layouts.admin.merchants.index', ['users' => []]);
    }

    /**
     * Show the form for creating a new user
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('layouts.admin.merchants.create');
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

        return redirect()->route('admin.merchants')->withStatus(__('User successfully created.'));
    }

    /**
     * Show the form for editing the specified user
     *
     * @param  \App\User  $user
     * @return \Illuminate\View\View
     */
    public function edit()
    {
        return view('layouts.admin.merchants.edit', compact('user'));
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

        return redirect()->route('admin.merchants')->withStatus(__('User successfully updated.'));
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

        return redirect()->route('admin.merchants')->withStatus(__('User successfully deleted.'));
    }
}