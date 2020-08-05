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
    Route::put('profile/user', ['as' => 'profile.update', 'uses' => 'ProfileController@updateUser']);
    Route::put('profile/user-company', 'ProfileController@updateUserCompany');
    Route::get('profile/info', 'ProfileController@info');
    Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'ProfileController@password']);
});

//saleList
Route::group(['middleware' => 'auth'], function (): void {
    Route::resource('salelist', 'SaleListController');
    Route::get('/api/saleslist/sort', 'SaleListController@sortSaleList')->name('salelist.sortSaleList');
    Route::get('/api/salelist/{salelist}', 'SaleListController@getSaleList')->name('salelist.getSaleList');
});

//redirect-url
Route::group(['middleware' => 'auth'], function (): void {
    Route::resource('redirect-link', 'RedirectController', ['except' => ['store', 'show']]);
    Route::post('/redirect-link', 'RedirectController@publish')->name('redirect-link.publish');
    Route::get('/redirect-link/{uuid}', 'RedirectController@count')->name('redirect-link.count');
});

//template
Route::group(['middleware' => 'auth'], function (): void {
    Route::post('/template/confirm', 'TemplateController@confirm')->name('template.confirm');
    Route::post('/template/back', 'TemplateController@back')->name('template.back');
    Route::resource('template', 'TemplateController');
    Route::get('/api/template/sort', 'TemplateController@sortTemplate')->name('template.sortTemplate');
});

//approach folder
Route::group(['middleware' => 'auth'], function (): void {
    Route::resource('approach-folders', 'ApproachFolderController');

    Route::get('approach-folders/{folder}/approaches/create', 'ApproachController@create')->name('approaches.create');
    Route::get('/api/approach-folders/', 'ApproachFolderController@list');
    Route::post('/api/approach-folders/{folder}', 'ApproachController@store');

    Route::group(['middleware' => 'can:view,folder'], function (): void {
        Route::resource('approach-folders/{folder}/approaches', 'ApproachController', ['except' => ['create']]);
        Route::get('approach-folders/{folder}/approaches/{approach}/confirm', 'ApproachController@confirm')->name('approaches.confirm');
    });
});
