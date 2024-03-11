<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

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

Route::prefix('/')->group(function () {
    Route::get('login', 'AuthController@login')->name('login');
    Route::post('authenticate', 'AuthController@authenticate')->name('auth-authenticate');
    Route::get('logout', 'AuthController@logout')->name('logout');
});
Route::middleware(['auth'])->group(function () {
    Route::group(['prefix' => 'dashboard', 'as' => 'dashboard.'], function () {
        Route::get('index', 'DashboardController@index')->name('index');
    });

    Route::group(['prefix' => 'fpb', 'as' => 'fpb.'], function () {
        Route::get('index', 'FPBController@index')->name('index');
        Route::get('data-table', 'FPBController@dataTable')->name('dataTable');
        Route::get('create', 'FPBController@create')->name('create');
        Route::get('get-user', 'FPBController@getUser')->name('getUser');
        Route::get('get-product', 'FPBController@getProduct')->name('getProduct');
        Route::post('store', 'FPBController@store')->name('store');
        Route::get('show/{id}', 'FPBController@show')->name('show');
        Route::get('print/{id}', 'FPBController@print')->name('print');
    });

    Route::group(['prefix' => 'warehouse', 'as' => 'warehouse.'], function () {
        Route::get('list-location', 'WarehouseController@listLocation')->name('listLocation');
        Route::get('data-table-location', 'WarehouseController@dataTableLocation')->name('dataTableLocation');
        Route::get('list-product/{id}', 'WarehouseController@listProduct')->name('listProduct');
        Route::get('data-table-product', 'WarehouseController@dataTableProduct')->name('dataTableProduct');
    });

});


// Route::controller(AuthController::class)->prefix('/')->group(function() {
//     Route::get('login','login')->name('login');
//     Route::post('authenticate','authenticate')->name('auth-authenticate');
// });
