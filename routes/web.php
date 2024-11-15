<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\UserProductController;
use App\Http\Controllers\Admin\SocialLogin;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\CustomerController;
use App\Http\Controllers\Admin\OrderController;

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


    });

});
Route::controller(HomeController::class)->group(function(){
    Route::get('/', 'index')->name('home');

    Route::get('/contact-us', 'aboutUs')->name('about.us');
    Route::get('/our-story', 'ourStory')->name('our.story');

});

Route::middleware(['auth'])->group(function () {

    Route::controller(HomeController::class)->group(function(){
        Route::get('/equipments', 'equipments')->name('equipments');
        Route::get('/equipments/category/{slug}', 'equipmentsCategory')->name('equipments.category');
        Route::get('/product_detail/{slug}', 'productDetail')->name('product_detail');

        Route::get('/cart', 'cart')->name('cart');


    });
    Route::controller(UserProductController::class)->group(function(){
        // Route::get('add-to-cart/{id}', 'addToCart')->name('add.to.cart');
        // Route::patch('update-cart', 'update')->name('update.cart');
        // Route::delete('remove-from-cart', 'remove')->name('remove.from.cart');
    });

    Route::controller(CartController::class)->group(function(){
        Route::POST('add-to-cart', 'addToCart')->name('add.to.cart');

        Route::post('/cart/update',  'updateCart')->name('cart.update');
        Route::post('/cart/remove', 'removeFromCart')->name('cart.remove');
        // Route::patch('update-cart', 'update')->name('update.cart');
        // Route::delete('remove-from-cart', 'remove')->name('remove.from.cart');
    });
    Route::get('logout', [AuthController::class,'logout'])->name('logout');
    Route::controller(CartController::class)->group(function(){
        Route::POST('/place-order', 'placeOrder')->name('place.order');
    });


    // Admin Routes
    Route::middleware(['admin'])->prefix('admin')->group(function () {
        Route::resource('roles', RoleController::class);
        Route::get('role-change-status', [RoleController::class, 'roleChangeStatus'])->name('role-change-status');
        Route::controller(AdminController::class)->group(function(){
            Route::get('/', 'dashboard');
            Route::get('/dashboard', 'dashboard')->name('dashboard');
            Route::get('/products', 'product')->name('product');
            Route::get('/customer-summary', 'customers')->name('customers');
            Route::get('/customer-view/{id}', 'customersView')->name('customers.view');
            Route::get('/add/product', 'addProduct')->name('add.product');
            Route::get('/orders', 'orders')->name('orders');
            Route::get('/orders/view/{id}', 'orderView')->name('orders.view');
            Route::get('/settings', 'settings')->name('settings');
            Route::post('update-profile','updateProfile')->name('profile');
            Route::post('employee-create','employeeCreate')->name('employee.create');
            Route::Get('/employee', 'employees')->name('employee.index');

        });

        Route::controller(ProductController::class)->name('product.')->group(function(){
            Route::post('/upload-product', 'uploadProduct')->name('add');
            Route::post('/update-product', 'updateProduct')->name('update');
            Route::get('/products/{id}', 'deleteProduct')->name('delete');
            Route::Get('/product-list', 'productList')->name('list');
            Route::Get('/product-edit/{id}', 'productEdit')->name('edit');
            Route::post('/products/{id}/status', 'updateStatus')->name('change.status');



            Route::get('/products/upload','showUploadForm1')->name('form1');
            Route::post('/products/upload',  'uploadProducts')->name('upload1');
            Route::post('/update-global-price', 'updateGlobalPrice')->name('update.global.price');

            Route::Get('/product-stats', 'productsStats')->name('stats');

        });
        Route::controller(CustomerController::class)->name('customer.')->group(function(){
            Route::post('/add-customer', 'create')->name('create');
            Route::Get('/customers', 'index')->name('index');
            Route::Get('/get-user-chart', 'getUserChart')->name('chart');
            Route::POST('/users/toggle-status/{id}', 'toggleStatus')->name('toggle-status');

            Route::get('/users/upload','showUploadForm')->name('form');
            Route::post('/users/upload',  'uploadUsers')->name('upload');


        });
        Route::controller(OrderController::class)->name('order.')->group(function(){
            Route::Get('/order-customer', 'orderCustomer')->name('customer');
            Route::Get('/new-orders','newOrders')->name('neworder');
            Route::Get('/assigned-orders','assignedOrders')->name('assignedorders');
            Route::POST('/assign-orders-employee','assignOrdersToEmployee')->name('assign.orders.to.employee');
            Route::post('/orders/{id}/cancel',  'cancelOrder' )->name('cancel');
            Route::Get('/order-stats', 'ordersStats')->name('stats');
            Route::Get('/get-order-chart', 'getChart')->name('chart');

        });

        Route::get('/support', function () {
            return view('admin.pages.support');
        })->name('support');
    });


});
