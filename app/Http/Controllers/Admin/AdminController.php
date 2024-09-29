<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard(){
        return view('admin.pages.dashboard');
    }

    public function product(){
        return view('admin.pages.products');
    }
    public function addProduct(){
        return view('admin.pages.add_new_product');
    }
}
