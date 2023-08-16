<?php

use App\Http\Controllers\ProductController;
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

Route::get('/',[ProductController::class,'index'])->name('home');
Route::get('/products/create',[ProductController::class,'create'])->name('products.create');
Route::post('/products/store',[ProductController::class,'store'])->name('products.store');
Route::delete('/product/{product}',[ProductController::class, 'deleteproduct'])->name('product.delete');
Route::get('/product/{product}', [ ProductController::class, 'editProduct'])->name('product.edit');
Route::post('/product/update/{product}', [ProductController::class, 'update'])->name('product.update');
