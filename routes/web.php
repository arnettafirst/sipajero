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
Route::get('/profile', 'ProfileController@show')->name('profile.show');
Route::patch('/profile', 'ProfileController@update')->name('profile.update');

Auth::routes([
    'reset' => false,
    'verify' => false,
]);

Route::get('/login', function () {
    return redirect('/');
})->name('login');

Route::group(['as' => 'admin.', 'middleware' => ['auth', 'check.role:admin'], 'namespace' => 'Admin', 'prefix' => 'admin'], function () {
    Route::get('/', 'DashboardController@index')->name('dashboard.index');
    Route::resource('farmer', 'FarmerController')->except(['create', 'edit']);
});

Route::group(['as' => 'farmer.', 'middleware' => ['auth', 'check.role:farmer'], 'namespace' => 'Farmer', 'prefix' => 'farmer'], function () {
    Route::get('/', 'DashboardController@index')->name('dashboard.index');
    Route::resource('farmer', 'FarmerController')->except(['create', 'store', 'edit', 'update', 'destroy']);
});
