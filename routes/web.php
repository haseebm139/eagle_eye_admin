<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\SocialLogin;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ProductController;

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



Route::middleware(['guest'])->group(function(){
    Route::controller(SocialLogin::class)->group(function(){

        Route::get('auth/google', 'redirectToGoogle')->name('auth.google');
        Route::get('auth/google/callback', 'handleGoogleCallback');

        Route::get('auth/facebook', 'redirectToFacebook')->name('auth.facebook');
        Route::get('auth/facebook/callback', 'handleFacebookCallback');
    });
    Route::controller(AuthController::class)->group(function(){
        Route::get('login', 'login')->name('login');
        Route::get('register', 'register')->name('register');

        Route::post('login', 'loginProcess')->name('login.process');
        Route::post('register', 'registerProcess')->name('register.process');
        Route::get('logout', 'logout')->name('logout');

    });
});


Route::get('/', function () {
    return view('user.pages.index');
})->name('home');
Route::get('/equipments', function () {
    return view('user.pages.equipments');
})->name('equipments');

Route::get('/product-detail', function () {
    return view('user.pages.product_detail');
})->name('product_detail');

Route::get('/about-us', function () {
    return view('user.pages.about_us');
})->name('about.us');

Route::get('/our-story', function () {
    return view('user.pages.our_story');
})->name('our.story');

Route::get('/cart', function () {
    return view('user.pages.cart');
})->name('cart');
// Route::get('/home', function () {
//     return view('admin.pages.dashboard');
// })->name('home');
Route::middleware(['auth','admin'])->prefix('admin')->group(function () {
    // Route::get('/', function () {
    //     return view('admin.pages.dashboard');
    // })->name('welcome');

    // Route::get('/dashboard', function () {
    //     return view('admin.pages.dashboard');
    // })->name('dashboard');

    // Route::get('/products', function () {
    //     return view('admin.pages.products');
    // })->name('product');

    // Route::get('/add/product', function () {
    //     return view('admin.pages.add_new_product');
    // })->name('add.product');

    Route::controller(AdminController::class)->group(function(){
        Route::get('/', 'dashboard');
        Route::get('/dashboard', 'dashboard')->name('dashboard');
        Route::get('/products', 'product')->name('product');
        Route::get('/add/product', 'addProduct')->name('add.product');



    });

    Route::controller(ProductController::class)->name('product.')->group(function(){
        Route::post('/upload-product', 'uploadProduct')->name('add');
        Route::Get('/product-list', 'productList')->name('list');
        Route::post('/products/{id}/status', 'updateStatus')->name('change.status');



    });

});
