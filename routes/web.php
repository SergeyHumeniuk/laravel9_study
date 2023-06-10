<?php

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
Route::group(['namespace' => 'App\Http\Controllers'], function(){
    Route::get('/', [App\Http\Controllers\StartController::class, 'index'])->name('home');
    Route::get('/product/{id}', [App\Http\Controllers\ProductPageController::class, 'index'])->name('product_page');
    Route::get('/category/{id}', [App\Http\Controllers\CategoryPageController::class, 'index'])->name('category_page');
    Route::post('/cart/add/{product}', [App\Http\Controllers\CartController::class, 'addItem'])->name('cart.add');
    Route::post('/cart/delete/{product}', [App\Http\Controllers\CartController::class, 'deleteItem'])->name('cart.delete');
    Route::get('/cart', [App\Http\Controllers\CartController::class, 'index'])->name('cart');
});

Route::group(['middleware'=>'auth','namespace' => 'App\Http\Controllers\Admin'], function(){
    Route::get('/admin/admin', 'AdminController@index');
    Route::get('/admin/orders', 'AdminOrdersController@index');
    Route::get('/admin/products', [App\Http\Controllers\Admin\AdminProductsController::class, 'index'])->name('products');
    Route::match(['get', 'post'],'/admin/update_products/{id}', [App\Http\Controllers\Admin\AdminProductsController::class, 'updateProduct'])->name('update_product');
    Route::get('/admin/delete_products/{id}', [App\Http\Controllers\Admin\AdminProductsController::class, 'deleteProduct'])->name('delete_product');
    Route::get('/admin/categorys', 'AdminCategorysController@index')->name('category');
    Route::post('/admin/categorys_add', 'AdminCategorysController@store')->name('new-category');
    //Route::post('/admin/categorys_delete', 'AdminCategorysController@destroy')->name('delete-category');
    Route::get('/admin/add_products', [App\Http\Controllers\Admin\AdminAddProductsController::class, 'index']);
    Route::post('/admin/add_products', [App\Http\Controllers\Admin\AdminAddProductsController::class, 'addProduct'])->name('add_products');
    Route::get('/admin/setting', [App\Http\Controllers\Admin\AdminSettingController::class, 'index']);
    Route::post('/admin/setting', [App\Http\Controllers\Admin\AdminSettingController::class, 'store'])->name('add-setting');
    Route::get('/admin/setting/{id}', [App\Http\Controllers\Admin\AdminSettingController::class, 'update'])->name('update-setting');
    //Route::post('/admin/setting/add_media', [App\Http\Controllers\Admin\AdminSettingController::class, 'addMadia'])->name('add-setting-media');
});

/*Route::get('/', function () {
    return view('welcome');
});*/

Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
