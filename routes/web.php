<?php

use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view("welcome");
})->name("/");

Route::get('/locale/{locale}', [\App\Http\Controllers\MainController::class, "changeLocale"])->name("locale");

Route::group(['prefix' => 'admin', "middleware" => "admin"], function () {
    Route::get('/', function () {
        return view("admin.main.main");
    })->name("admin");
    Route::controller(\App\Http\Controllers\ProductController::class)->group(function () {

        Route::get('/products', "index")->name("products");

        Route::get('/product/add', function () {
            return view("admin.products.add");
        })->name("form_add_product");

        Route::post('/product/add', "add")->name("add_product");

        Route::get('/product/edit/{id}', "edit_form")->name("form_edit_product");

        Route::post('/product/edit/{product}', "edit")->name("edit_product");

        Route::get('/product/delete/{id}/', "delete")->name("delete_product");
    });
    Route::controller(\App\Http\Controllers\OrderController::class)->group(function () {

        Route::get('/orders', "index")->name("orders");

        Route::get('/order/execute/{id}', "execute")->name("execute_order");
    });
    Route::controller(\App\Http\Controllers\UserController::class)->group(function () {

        Route::get('/users', "index")->name("users");

        Route::get('/user/{id}', "delete")->name("delete_user");
    });
});

Auth::routes();


