<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
//Route::get('/admin/categorys', 'AdminCategorysController@getCategory')->name('category');
Route::group(['namespace' => 'Admin', 'prefix' => 'category'], function(){
    Route::get('/', [App\Http\Controllers\Admin\AdminCategorysTableController::class, '__invoke'])->name('category');

});
Route::group(['namespace' => 'Admin', 'prefix' => 'deleteCategory'], function(){
    Route::post('/', [App\Http\Controllers\Admin\AdminCategorysController::class, 'destroy']);

});

