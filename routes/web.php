<?php

use App\Http\Controllers\BlogController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\AccessoryController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\NickController;
use App\Http\Controllers\VideoController;
use App\Http\Controllers\WheelController;
use App\Http\Controllers\CheckoutController;
use App\Models\Accessory;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [IndexController::class, 'home']);
Route::get('/dich-vu', [IndexController::class, 'dichvu'])->name('dichvu'); //Tat ca dich vu
Route::get('/dich-vu/{slug}', [IndexController::class, 'dichvucon'])->name('dichvucon'); //Dich vu con cua dich vu
Route::get('/danh-muc-game/{slug}', [IndexController::class, 'danhmuc_game'])->name('danhmucgame'); //Tat ca dich vu
Route::get('/mua-nick', [IndexController::class, 'mua_nick'])->name('mua-nick'); //Dich vu con cua dich vu
Route::get('/mua-nick/{slug}', [IndexController::class, 'mua_nick_slug'])->name('mua-nick-slug'); //Dich vu con cua dich vu
Route::get('/chi-tiet-nick/{code}', [IndexController::class, 'nick_detail'])->name('nick-detail');
Route::get('blogs', [IndexController::class, 'blogs'])->name('blogs');
Route::get('post/{slug}', [IndexController::class, 'blog_detail'])->name('blog_detail');
Route::get('/video-highlight', [IndexController::class, 'video_highlight'])->name('video-highlight');
Route::get('/mua-the', [IndexController::class, 'buy_card'])->name('mua-the');
Route::get('/nap-the', [IndexController::class, 'recharge_card'])->name('nap-the');
Route::get('/nap-atm', [IndexController::class, 'recharge_atm'])->name('nap-atm');
Route::post('/show-video', [IndexController::class, 'show_video'])->name('show-video'); //----POST------
Route::get('/tai-khoan', [IndexController::class, 'account'])->name('account');
Route::get('/thanh-toan/{code}', [IndexController::class, 'pay'])->name('thanh-toan');
Route::get('/lich-su-gd', [IndexController::class, 'history'])->name('lich-su');
Route::get('/tai-khoan-da-mua', [IndexController::class, 'purchased_account'])->name('tai-khoan-da-mua');

Auth::routes();

Route::middleware(['auth','adminRole'])->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');

    //Slider
    Route::resource('/slider', SliderController::class);

    //Category
    Route::resource('/category', CategoryController::class);

    //Service
    Route::resource('/service', ServiceController::class);

    //Accessory
    Route::resource('/accessory', AccessoryController::class);

    //Blog
    Route::resource('/blog', BlogController::class);

    //Nick
    Route::resource('/nick', NickController::class);
    
    //Gallery
    Route::resource('/gallery', GalleryController::class);

    //Video
    Route::resource('/video', VideoController::class);

    //Wheel
    Route::resource('/wheel', WheelController::class);
});

//Cong thanh toan
Route::post('/vnpay_payment', [CheckoutController::class, 'vnpay_payment'])->name('vnpay_payment');

//API Gach the
Route::resource('/nap', RechargeCardController::class);
