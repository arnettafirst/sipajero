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

Route::get('/', 'WelcomeController@index')->name('welcome');

Auth::routes([
    'reset' => false,
    'verify' => false,
]);

Route::get('/login', function () {
    return redirect('/');
})->name('login');

Route::group(['middleware' => ['auth', 'check.role:admin'], 'namespace' => 'Admin', 'prefix' => 'admin'], function () {
    Route::get('/', 'DashboardController@index')->name('admin.dashboard.index');
    Route::resource('farmer', 'FarmerController', ['as' => 'admin'])->except(['create', 'edit']);
});

Route::group(['middleware' => ['auth', 'check.role:farmer'], 'namespace' => 'Farmer', 'prefix' => 'farmer'], function () {
    Route::get('/', 'DashboardController@index')->name('farmer.dashboard.index');
    Route::resource('farmer', 'FarmerController', ['as' => 'farmer'])->except(['create', 'store', 'edit', 'update', 'destroy']);
});
