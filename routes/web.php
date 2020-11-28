<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryProductController;
use App\Http\Controllers\BrandProductController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;

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
//user
Route::get('/',[HomeController::class,'index']);
Route::get('/trang-chu',[HomeController::class,'index']);


//admin
Route::get('/admin',[AdminController::class,'index']);
Route::get('/dashboard',[AdminController::class,'show_dashboard']);
Route::get('/logout',[AdminController::class,'logout']);
Route::post('/admin-dashboard',[AdminController::class,'dashboard']);


//category-product
Route::get('/add-category-product',[CategoryProductController::class,'add_category_product']);
Route::get('/all-category-product',[CategoryProductController::class,'all_category_product']);
Route::get('/edit-category-product/{id}',[CategoryProductController::class,'edit_category_product']);
Route::get('/delete-category-product/{id}',[CategoryProductController::class,'delete_category_product']);
Route::post('/save-category-product',[CategoryProductController::class,'save_category_product']);
Route::post('/update-category-product/{id}',[CategoryProductController::class,'update_category_product']);
Route::get('/danh-muc-san-pham/{id}',[CategoryProductController::class,'show_category_home']);
Route::get('/thuong-hieu-san-pham/{id}',[CategoryProductController::class,'show_brand_home']);


//brand
Route::get('/add-brand',[BrandProductController::class,'add_brand']);
Route::get('/all-brand',[BrandProductController::class,'all_brand']);
Route::get('/edit-brand/{id}',[BrandProductController::class,'edit_brand']);
Route::get('/delete-brand/{id}',[BrandProductController::class,'delete_brand']);
Route::post('/save-brand',[BrandProductController::class,'save_brand']);
Route::post('/update-brand/{id}',[BrandProductController::class,'update_brand']);

//product admin
Route::get('/add-product',[ProductController::class,'add_product']);
Route::get('/all-product',[ProductController::class,'all_product']);
Route::get('/edit-product/{id}',[ProductController::class,'edit_product']);
Route::get('/delete-product/{id}',[ProductController::class,'delete_product']);
Route::post('/save-product',[ProductController::class,'save_product']);
Route::post('/update-product/{id}',[ProductController::class,'update_product']);


//product user
Route::get('/chi-tiet-san-pham/{id}',[ProductController::class,'show_details']);
Route::get('/danh-muc-san-pham/{id}',[CategoryProductController::class,'show_category_home']);
Route::get('/thuong-hieu-san-pham/{id}',[CategoryProductController::class,'show_brand_home']);

//cart
Route::post('/save-cart',[CartController::class,'save_cart']);
Route::post('/add-cart',[CartController::class,'add_cart']);
Route::get('/show-cart',[CartController::class,'show_cart']);
Route::get('/delete-cart/{id}',[CartController::class,'delete_cart']);

//checkout
Route::get('/login-checkout',[CheckoutController::class,'login_checkout']);
Route::post('/add-customor',[CheckoutController::class,'add_customor']);
Route::get('/checkout',[CheckoutController::class,'checkout']);
Route::post('/save-order',[CheckoutController::class,'save_order']);
Route::post('/login-customor',[CheckoutController::class,'login_customor']);
Route::get('/logout',[CheckoutController::class,'logout']);
Route::post('/order-place',[CheckoutController::class,'order_place']);