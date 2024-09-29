<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\SocialLogin;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\AdminController;

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



Route::middleware(['guest'])->controller(SocialLogin::class)->group(function(){
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

Route::get('/', function () {
    return view('user.pages.index');
})->name('welcome');

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
});
