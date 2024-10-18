<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
class HomeController extends Controller
{
    public function index(){
        $data['products'] = Product::with('image')->select('id','name','slug' )->get();
        return view('user.pages.index',compact('data'));
    }
    public function equipments(){
        return view('user.pages.equipments');
    }
    public function productDetail($slug){
        $product = Product::with('images')->where('slug', $slug)->firstOrFail();
        $data['products'] = Product::with('image')->select('id','name','slug' )->get();
        $data['s_products'] = Product::with('image')->select('id','name','slug' )->get();
        return view('user.pages.product_detail',compact('product','data'));
    }
    public function aboutUs(){
        return view('user.pages.about_us');
    }
    public function ourStory(){
        return view('user.pages.our_story');
    }
    public function cart(){
        return view('user.pages.cart');
    }

}
