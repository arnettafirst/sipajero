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
Route::get('/information', 'WelcomeController@information')->name('information');
Route::get('/information/{slug}', 'WelcomeController@informationDetail')->name('information.detail');
Route::get('/discussion', 'WelcomeController@discussion')->name('discussion');
Route::get('/discussion/{slug}', 'WelcomeController@discussionDetail')->name('discussion.detail');
Route::get('/profile', 'ProfileController@show')->name('profile.show');
Route::patch('/profile', 'ProfileController@update')->name('profile.update');

Auth::routes([
    'reset' => false,
    'verify' => false,
]);

Route::get('/login', function () {
    abort(404);
})->name('login');

Route::get('/register', function () {
    abort(404);
})->name('register');

Route::group(['as' => 'admin.', 'middleware' => ['auth', 'check.role:admin'], 'namespace' => 'Admin', 'prefix' => 'admin'], function () {
    Route::get('/', 'DashboardController@index')->name('dashboard.index');
    Route::resource('harvest', 'HarvestController')->except('create', 'show');
    Route::resource('farmer', 'FarmerController')->except('create', 'edit');
    Route::resource('information', 'InformationController');
    Route::resource('report', 'ReportController')->except('create', 'store', 'edit', 'update', 'destroy');
    Route::resource('discussion', 'DiscussionController')->except('destroy');
    Route::post('/discussion/{discussion}', 'DiscussionController@addComment')->name('comment.store');
});

Route::group(['as' => 'farmer.', 'middleware' => ['auth', 'check.role:farmer'], 'namespace' => 'Farmer', 'prefix' => 'farmer'], function () {
    Route::get('/', 'DashboardController@index')->name('dashboard.index');
    Route::resource('farmer', 'FarmerController')->except('create', 'store', 'show', 'edit', 'update', 'destroy');
    Route::resource('report', 'ReportController')->except('create', 'edit', 'update', 'destroy');
    Route::resource('discussion', 'DiscussionController')->except('destroy');
    Route::post('/discussion/{discussion}', 'DiscussionController@addComment')->name('comment.store');
});
