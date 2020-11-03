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
    'register' => false,
    'reset' => false,
    'verify' => false,
]);

Route::get('/login', function () {
    return redirect('/');
})->name('login');

Route::group(['middleware' => 'admin', 'namespace' => 'Admin', 'prefix' => 'admin'], function () {
    Route::get('/', 'DashboardController@index')->name('admin.dashboard.index');
});

Route::group(['middleware' => 'auth', 'namespace' => 'Farmer', 'prefix' => 'farmer'], function () {
    Route::get('/', 'DashboardController@index')->name('farmer.dashboard.index');
});
