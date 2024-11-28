<?php

use Carbon\Carbon;
use App\Models\Product;
use App\Models\User;
use App\Models\Order;
use App\Models\Category;
use App\Models\CartProduct;

if (! function_exists('productCount')) {
    function productCount()
    {
        return Product::count();

    }
}


if (! function_exists('productPublished')) {
    function productPublished()
    {
        return Product::where('status','1')->count();

    }
}

if (! function_exists('productUNpublished')) {
    function productUNpublished()
    {
        return Product::where('status','2')->count();

    }
}

if (! function_exists('productLowStock')) {
    function productLowStock()
    {
        return Product::where('status','1')->where('stock','<','10')->count();

    }
}


if (! function_exists('allClients')) {
    function allClients()
    {
        return User::where('type','user')->count();

    }
}
if (! function_exists('activeClients')) {
    function activeClients()
    {
        return User::where('status','1')->where('type','user')->count();

    }
}
if (! function_exists('suspendClients')) {
    function suspendClients()
    {
        return User::where('status','0')->where('type','user')->count();

    }
}

if (! function_exists('totalOrder')) {
    function totalOrder()
    {
        return Order::count();

    }
}

if (! function_exists('totalOrderPending')) {
    function totalOrderPending()
    {
        return Order::where('status','0')->count();

    }
}

if (! function_exists('totalOrderComplete')) {
    function totalOrderComplete()
    {
        return Order::where('status','2')->count();

    }
}

if (! function_exists('abandonedCart')) {
    function abandonedCart()
    {

        return CartProduct::where('created_at', '<', Carbon::now()->subDay())->count();

    }
}

if (! function_exists('getUserCategory')) {
    function getUserCategory()
    {
        $categoryId = auth()->user()->category_id;
        $category = Category::find($categoryId);
        return $category;

    }
}


if (! function_exists('abandonedCartProducts')) {
    function abandonedCartProducts()
    {
        return CartProduct::where('created_at', '<', Carbon::now()->subDay())->sum('quantity');;

    }
}


if (! function_exists('convertMdyToYmd')) {
    function convertMdyToYmd($date)
    {
        return Carbon::createFromFormat('m-d-Y', $date)->format('Y-m-d');
    }
}
if (! function_exists('getUserCategory')) {
    function getUserCategory()
    {
        $categoryId = auth()->user()->category_id;
        $category = Category::find($categoryId);
        return $category;

    }
}
