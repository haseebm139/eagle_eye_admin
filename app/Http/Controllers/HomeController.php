<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ShippingRate;


class HomeController extends Controller
{
    public function index(){
        $data['products'] = Product::with('image')->select('id','name','slug' )->get();
        return view('user.pages.index',compact('data'));
    }
    public function equipments(){
        $data['products'] = Product::with('image')->select('id','name','slug' )->get();
        return view('user.pages.equipments',compact('data'));
    }
    public function productDetail($slug){

        $product = Product::with('images')->where('slug', $slug)->firstOrFail();
        if (!isset($product)) {

            return redirect()->route('home');
        }

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
        $data['cart'] = \Cart::getContent();
        if ($data['cart']->isEmpty()) {
            // Redirect to the home page if the cart is empty
            return redirect()->route('home')->with(array('message'=>'Cart Empty','type'=>'error'));
        }
        $data['shipping_rates'] = ShippingRate::where('status','1')->get();

        return view('user.pages.cart',compact('data'));
    }

}
