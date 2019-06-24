<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::namespace('Front')->group(function()
{
    Route::get('/','HomeController@index')->name('front.home');
    Route::get('/view-categories','HomeController@viewCategories')->name('front.view-categories');
    
    Route::get('/view-products','HomeController@viewProducts')->name('front.view-products');
    Route::get('/view-products/{cate}','HomeController@viewProductsByCate')->name('front.view-products.category');

    Route::get('/view-merchants','HomeController@viewMerchants')->name('front.view-merchants');
    Route::get('/view-merchants/{merchantId}','HomeController@viewMerchantById')->name('front.view-merchants.detail');

    Route::get('files/{id}/preview','FileController@filePreview')->name('front.file.preview');
    Route::get('files/{id}/download','FileController@fileDownload')->name('front.file.download');
});

Auth::routes();

Route::namespace('Auth')->middleware(['auth'])->group(function()
{
    Route::get('logout','LoginController@logout')->name('user.logout');
});

// Admin
Route::prefix('admin')->namespace('Admin')->middleware(['auth', 'auth.admin'])->group(function()
{
    // single page
    Route::get('/', 'SinglePageController@displaySPA')->name('admin.spa');

    /* Users */
    //-profile
    Route::get('/profile', 'ProfileController@index')->name('admin.profile');
    Route::post('/profile', 'ProfileController@update')->name('admin.profile.update');

    //-merchants
    Route::get('/merchants', 'MerchantsController@index')->name('admin.merchants');
    Route::post('/merchants', 'MerchantsController@update')->name('admin.merchants.update');
    Route::get('/merchants/create', 'MerchantsController@create')->name('admin.merchants.create');
    Route::post('/merchants/store', 'MerchantsController@store')->name('admin.merchants.store');

    //-customers
    Route::get('/users', 'UsersController@index')->name('admin.users');
    Route::get('/users/create', 'UsersController@create')->name('admin.users.create');
    Route::get('/users/edit/{user}', 'UsersController@edit')->name('admin.users.edit');

    Route::put('/users/update/{user}', 'UsersController@update')->name('admin.users.update');    
    Route::post('/users/store', 'UsersController@store')->name('admin.users.store');
    Route::delete('/users/{user}', 'UsersController@destroy')->name('admin.users.destroy');

    //-visits
    Route::get('/visits', 'VisitsController@index')->name('admin.visits');
    Route::post('/visits', 'VisitsController@update')->name('admin.visits.update');
    Route::get('/visits/create', 'VisitsController@create')->name('admin.visits.create');
    Route::post('/visits/store', 'VisitsController@store')->name('admin.visits.store');

    /* business */
    //-categories
    Route::get('/categories/create', 'CateController@create')->name('admin.categories.create');
    Route::get('/categories/reload', 'CateController@reload')->name('admin.categories.reload');
    Route::get('/categories/edit/{cate}', 'CateController@edit')->name('admin.categories.edit');
    Route::get('/categories', 'CateController@index')->name('admin.categories');

    Route::post('/categories', 'CateController@store')->name('admin.categories.store');
    Route::put('/categories', 'CateController@update')->name('admin.categories.update');
    Route::delete('/categories/{cate}', 'CateController@destroy')->name('admin.categories.destroy');

    //-products
    Route::get('/products/create', 'ProductsController@create')->name('admin.products.create');
    Route::get('/products/edit/{product}', 'ProductsController@edit')->name('admin.products.edit');

    Route::get('/products', 'ProductsController@index')->name('admin.products');
    Route::post('/products', 'ProductsController@store')->name('admin.products.store');
    Route::put('/products', 'ProductsController@update')->name('admin.products.update');
    Route::delete('/products', 'ProductsController@destroy')->name('admin.products.destroy');

    //-feeds
    Route::get('/feeds/create', 'FeedsController@create')->name('admin.feeds.create');

    Route::get('/feeds', 'FeedsController@index')->name('admin.feeds');
    Route::post('/feeds', 'FeedsController@store')->name('admin.feeds.store');
    Route::put('/feeds', 'FeedsController@update')->name('admin.feeds.update');
    Route::delete('/feeds', 'FeedsController@destroy')->name('admin.feeds.destroy');

    // resource routes
    Route::resource('groups','GroupController');
    Route::resource('permissions','PermissionController');
    Route::resource('files','FileController');
    Route::resource('file-groups','FileGroupController');
});

// Merchant
Route::prefix('merchant')->namespace('Merchant')->middleware(['auth', 'auth.merchant'])->group(function()
{
    /* front page */
    Route::get('/', 'FrontController@displaySPA')->name('merchant.front');

    /* profile */
    Route::get('/profile', 'ProfileController@index')->name('merchant.profile');
    Route::post('/profile', 'ProfileController@update')->name('merchant.profile.update');
    
    //-password
    Route::post('/profile/password', 'ProfileController@updatePassword')->name('merchant.profile.password');
    Route::post('/profile/password', 'ProfileController@updatePassword')->name('merchant.profile.password');

    /* business */
    //-settings
    Route::get('/settings', 'SettingsController@index')->name('merchant.settings');
    Route::get('/settings/phase', 'SettingsController@phase')->name('merchant.settings.phase');
    Route::post('/settings', 'SettingsController@update')->name('merchant.settings.update');

    //-products
    Route::get('/products/create', 'ProductsController@create')->name('merchant.products.create');
    Route::get('/products/edit/{product}', 'ProductsController@edit')->name('merchant.products.edit');

    Route::get('/products', 'ProductsController@index')->name('merchant.products');
    Route::post('/products', 'ProductsController@store')->name('merchant.products.store');
    Route::put('/products', 'ProductsController@update')->name('merchant.products.update');
    Route::delete('/products', 'ProductsController@destroy')->name('merchant.products.destroy');

    //-orders
    Route::get('/orders', 'OrdersController@index')->name('merchant.orders');
    Route::post('/orders', 'OrdersController@update')->name('merchant.orders.update');
    Route::post('/orders/store', 'OrdersController@store')->name('merchant.orders.store');

    //-customers
    Route::get('/customers', 'CustomersController@index')->name('merchant.customers');
    Route::post('/customers', 'CustomersController@update')->name('merchant.customers.update');
    Route::get('/customers/create', 'CustomersController@create')->name('merchant.customers.create');
    Route::post('/customers/store', 'CustomersController@store')->name('merchant.customers.store');
});