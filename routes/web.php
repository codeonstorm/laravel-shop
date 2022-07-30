<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Front\FrontController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\SizeController;
use App\Http\Controllers\Admin\ColorController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\CouponController;
use App\Http\Controllers\Admin\ProductController;

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
// auth
Route::get('signup/',[AuthController::class,'registration'])->name('signup');
Route::post('signup/process/',[AuthController::class,'registration_process'])->name('signup_process');
Route::get('login/',[AuthController::class,'authentication'])->name('login');
Route::post('login/process',[AuthController::class,'authentication_process'])->name('login_process');
Route::get('logout', function () {
    session()->forget('USER_ID');
    session()->forget('RANK');
    session()->forget('USER_NAME');
    return redirect('/');
});
/*
Route::get('/verification/{id}',[FrontController::class,'email_verification']);
Route::post('forgot_password',[FrontController::class,'forgot_password']);
Route::get('/forgot_password_change/{id}',[FrontController::class,'forgot_password_change']);
Route::post('forgot_password_change_process',[FrontController::class,'forgot_password_change_process']);
*/



// front route..
Route::get('/',[FrontController::class,'index']);
Route::get('category/{slug}',[FrontController::class,'category']);
Route::get('product/{slug}/{color?}',[FrontController::class,'product']);
Route::get('product/{slug}/patid/{attr_id}',[FrontController::class,'product']);
Route::post('add_to_cart',[FrontController::class,'add_to_cart']);
Route::get('cart',[FrontController::class,'cart']);
Route::get('/checkout',[FrontController::class,'checkout']);
Route::post('/place_order',[FrontController::class,'place_order']);
Route::get('/order_placed',[FrontController::class,'order_placed']);
Route::get('/order_fail',[FrontController::class,'order_fail']);
Route::get('/instamojo_payment_redirect',[FrontController::class,'instamojo_payment_redirect']);
Route::post('/product_attr',[FrontController::class,'product_attr']);// to product front page



Route::group(['middleware'=>'user_auth'],function(){
Route::get('/order',[FrontController::class,'order']);
Route::get('/order_detail/{order_id}',[FrontController::class,'order_detail']);
});


//Admin route..
Route::group(['middleware'=>'admin_auth'],function(){
    Route::get('admin/deshboard', [AdminController::class,'index']);

    // Category route..
    Route::get('admin/category',[CategoryController::class,'index']);
    Route::get('admin/category/manage_category',[CategoryController::class,'manage_category']);
    Route::get('admin/category/manage_category/{slug}',[CategoryController::class,'manage_category']);
    Route::post('admin/category/manage_category_process',[CategoryController::class,'manage_category_process'])->name('category.manage_category_process');
    Route::get('admin/category/delete/{slug}',[CategoryController::class,'delete']);
    Route::get('admin/category/status/{status}/{slug}',[CategoryController::class,'status']);

    // Size route..
    Route::get('admin/size',[SizeController::class,'index']);
    Route::get('admin/size/manage_size',[SizeController::class,'manage_size']);
    Route::get('admin/size/manage_size/{slug}',[SizeController::class,'manage_size']);
    Route::post('admin/size/manage_size_process',[SizeController::class,'manage_size_process'])->name('size.manage_size_process');
    Route::get('admin/size/delete/{slug}',[SizeController::class,'delete']);
    Route::get('admin/size/status/{status}/{slug}',[SizeController::class,'status']);

    // Color route..
    Route::get('admin/color',[ColorController::class,'index']);
    Route::get('admin/color/manage_color',[ColorController::class,'manage_color']);
    Route::get('admin/color/manage_color/{slug}',[ColorController::class,'manage_color']);
    Route::post('admin/color/manage_color_process',[ColorController::class,'manage_color_process'])->name('color.manage_color_process');
    Route::get('admin/color/delete/{slug}',[ColorController::class,'delete']);
    Route::get('admin/color/status/{status}/{slug}',[ColorController::class,'status']);

    // Brand route..
    Route::get('admin/brand',[BrandController::class,'index']);
    Route::get('admin/brand/manage_brand',[BrandController::class,'manage_brand']);
    Route::get('admin/brand/manage_brand/{slug}',[BrandController::class,'manage_brand']);
    Route::post('admin/brand/manage_brand_process',[BrandController::class,'manage_brand_process'])->name('brand.manage_brand_process');
    Route::get('admin/brand/delete/{slug}',[BrandController::class,'delete']);
    Route::get('admin/brand/status/{status}/{slug}',[BrandController::class,'status']);

    // Brand route..
    Route::get('admin/coupon',[CouponController::class,'index']);
    Route::get('admin/coupon/manage_coupon',[CouponController::class,'manage_coupon']);
    Route::get('admin/coupon/manage_coupon/{slug}',[CouponController::class,'manage_coupon']);
    Route::post('admin/coupon/manage_coupon_process',[CouponController::class,'manage_coupon_process'])->name('coupon.manage_coupon_process');
    Route::get('admin/coupon/delete/{slug}',[CouponController::class,'delete']);
    Route::get('admin/coupon/status/{status}/{slug}',[CouponController::class,'status']);

    //Product routes..
    Route::get('admin/product',[ProductController::class,'index']);
    Route::get('admin/product/manage_product',[ProductController::class,'manage_product']);
    Route::get('admin/product/manage_product/{id}',[ProductController::class,'manage_product']);
    Route::post('admin/product/manage_producty_process',[ProductController::class,'manage_product_process'])->name('product.manage_product_process');
    Route::get('admin/product/delete/{id}',[ProductController::class,'delete']);
    Route::get('admin/product/status/{status}/{id}',[ProductController::class,'status']);
    Route::get('admin/product/product_attr_delete/{paid}/{pid}',[ProductController::class,'product_attr_delete']);
    Route::get('admin/product/product_images_delete/{paid}/{pid}',[ProductController::class,'product_images_delete']);

});
