<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/sidebar', function () {
    return [
        'company_large_categories' => App\Models\CompanyLargeCategory::select(['id', 'name'])->get(),
        'company_middle_categories' => App\Models\CompanyMiddleCategory::select(['id', 'name'])->get(),
        'listing_stocks' => App\Models\ListingStock::select(['id', 'name'])->get(),
    ];
});
// Route::group(['middleware' => 'auth'], function (): void {
Route::resource('companies', 'API\CompanyController');
// });
