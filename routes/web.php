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

Route::get('/', function () {
    return redirect()->route('home');
});
Auth::routes();

//home
Route::group(['middleware' => 'auth'], function (): void {
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/configure', 'HomeController@configure')->name('home.configure');
});

//company
Route::group(['middleware' => 'auth'], function (): void {
    Route::resource('companies', 'CompanyController');
    Route::get('/company/search', 'CompanyController@searchCompany')->name('companies.searchCompany');
});

//user profile
Route::group(['middleware' => 'auth'], function (): void {
    Route::resource('user', 'UserController', ['except' => ['show']]);
    Route::get('profile', ['as' => 'profile.edit', 'uses' => 'ProfileController@edit']);
    Route::put('profile', ['as' => 'profile.update', 'uses' => 'ProfileController@update']);
    Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'ProfileController@password']);
});

//home
Route::group(['middleware' => 'auth'], function (): void {
    Route::resource('search-condition', 'SearchConditionController');
});

//redirect-url
Route::group(['middleware' => 'auth'], function (): void {
    Route::resource('redirect-link', 'RedirectController', ['except' => ['store', 'show']]);
    Route::post('/redirect-link', 'RedirectController@publish')->name('redirect-link.publish');
    Route::get('/redirect-link/{uuid}', 'RedirectController@count')->name('redirect-link.count');
});

//template
Route::group(['middleware' => 'auth'], function (): void {
    Route::resource('template', 'TemplateController');
    Route::get('/confirm', 'TemplateController@confirm')->name('template.confirm');
});
