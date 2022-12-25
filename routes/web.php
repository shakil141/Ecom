<?php

use App\Admin;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\FrontendController;


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




Auth::routes();

Route::get('/home', [HomeController::class,'index'])->name('home');
Route::get('admin/home', [AdminController::class , 'index'])->name('dashboard');


// Admin Related Route...........................................

//----------------------login ----------------------------
Route::get('admin','Admin\LoginController@showLoginForm')->name('admin.login');
Route::post('admin','Admin\LoginController@Login');
Route::get('logout',[AdminController::class,'logout'])->name('admin.logout');
//----------------------login ----------------------------
//----------------------Category ----------------------------
Route::resource('categories','admin\CategoryController');

// .....................Category Status Changed..............................
Route::get('active-category/{category_id}',[AdminController::class , 'activeCategory'])->name('active.category');
Route::get('inactive-category/{category_id}',[AdminController::class , 'inActiveCategory'])->name('inactive.category');

// .....................Category Status Changed..............................
//----------------------Category ----------------------------

//----------------------Brand ----------------------------
Route::resource('/brand','admin\BrandController');

// .....................Brand Status Changed..............................
Route::get('active-brand/{brand_id}',[AdminController::class , 'activeBrand'])->name('active.brand');
Route::get('inactive-brand/{brand_id}',[AdminController::class , 'inActiveBrand'])->name('inactive.brand');
// .....................Brand Status Changed..............................

//----------------------Brand ----------------------------

// =====================Product Start==================================
Route::resource('products','admin\ProductController');

// .....................Product Status Changed..............................
Route::get('active-product/{product_id}',[AdminController::class,'activeProduct'])->name('active.product');
Route::get('inactive-product/{product_id}',[AdminController::class,'inActiveProduct'])->name('inactive.product');
// .....................Product Status Changed..............................

// .....................Product Coupon Start..............................
Route::resource('coupons','admin\CouponController');

// .....................Coupon Status Changed..............................
Route::get('active-coupon/{coupon_id}','AdminController@activeCoupon')->name('active.coupon');
Route::get('inactive-coupon/{coupon_id}','AdminController@inactiveCoupon')->name('inactive.coupon');
// .....................Coupon Status Changed..............................
// .....................Product Coupon End..............................


// =====================Product End==================================
// Admin Related Route...........................................



// Frontend Route Related.....................
Route::get('/',[FrontendController::class,'index'])->name('frontend.home');



// Cart ......................................
Route::get('cart-page',[CartController::class,'cartPage'])->name('cart-page');
Route::post('add-to-cart/{id}',[CartController::class,'addToCart'])->name('add-to-cart');
// Cart ......................................


// Frontend Route Related.....................
