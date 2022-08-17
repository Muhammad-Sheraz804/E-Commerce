<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\FrontendController;
use App\Http\Controllers\Frontend\FrontController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\CheckoutController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [FrontController::class, 'index'])->name('index');
Route::get('/category', [FrontController::class, 'category'])->name('category');
Route::get('/view_category/{slug}', [FrontController::class, 'view_category'])->name('view_category');
Route::get('/view_product/{cate_slug}/{prod_slug}', [FrontController::Class, 'view_product'])->name('view_product');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::post('/add_to_cart', [CartController::class, 'add_to_cart'])->name('add_to_cart');
Route::post('/delete_cart_item', [CartController::class, 'delete_cart_item'])->name('delete_cart_item');
Route::post('/update_cart', [CartController::class, 'update_cart'])->name('update_cart');

Route::middleware(['auth'])->group(function(){
	Route::get('/cart_item', [CartController::class, 'view_cart'])->name('cart');
	Route::get('checkout', [CheckoutController::class, 'index'])->name('checkout');
	Route::post('/place_order', [CheckoutController::class, 'place_order'])->name('place_order');
});

Route::middleware(['auth', 'isAdmin'])->group(function(){
Route::get('/dashboard', [FrontendController::class, 'dashboard'])->name('dashboard');


//Categories related Routes
Route::get('/categories', [AdminController::class, 'categories'])->name('categories');
Route::get('/add_category', [AdminController::class, 'add_category'])->name('add_category');
Route::post('/insert_category', [AdminController::class, 'insert'])->name('insert_category');
Route::put('/edit_category/categories/{categories}', [AdminController::class, 'edit_category'])->name('edit_category');
Route::patch('/update_category/categories/{categories}',[AdminController::class,'update_category'])->name('update_category');
Route::delete('/delete_category/categories/{categories}', [AdminController::class, 'delete_category'])->name('delete_category');


//Products related routes
Route::get('/products', [ProductController::Class, 'products'])->name('products');
Route::get('/add_product', [ProductController::class, 'add_product'])->name('add_product');
Route::post('/insert_product', [ProductController::class, 'insert_product'])->name('insert_product');
Route::put('/edit_product/product/{product}', [ProductController::class, 'edit_product'])->name('edit_product');
Route::patch('/update_product/product/{product}',[ProductController::class,'update_product'])->name('update_product');
Route::delete('/delete_product/product/{product}', [ProductController::class, 'delete_product'])->name('delete_product');
});