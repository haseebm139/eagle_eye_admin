<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ShippingRate;
use App\Models\Category;
use App\Models\ProductCategory;

use Auth;

class HomeController extends Controller
{
    public function index(){
        $data =[];
        if (Auth::check()) {
            $user = Auth::user();
            $categoryId = $user->category_id;
            $productIds =ProductCategory::where('category_id',$categoryId)->pluck('product_id');
            $data['products'] = Product::with('image')->whereIn('id',$productIds)->select('id','name','slug' )->get();
        }
        return view('user.pages.index',compact('data'));
    }
    public function equipments(){
        $data['categories'] = Category::with(['products' => function ($query) {
            $query->with('images');
        }])->orderBy('id','DESC')->get();
        // return $data['categories'][0]->products[0];
        $data['products'] = Product::with('image')->select('id','name','slug' )->get();
        return view('user.pages.equipments',compact('data'));
    }
    public function equipmentsCategory($slug){
            $data['categories'] = Category::where('slug',$slug)->with(['products' => function ($query) {
            $query->with('images');
        }])->orderBy('id','DESC')->first();

        $data['products'] = Product::with('image')->select('id','name','slug' )->get();
        return view('user.pages.equipments',compact('data'));
    }

    public function saveCategory(Request $request)
    {
        $categoryId = $request->input('category_id');

        // Save the category ID to the session
        session(['category_id' => $categoryId]);
        if (Auth::check()) {
            $user = Auth::user(); // Get the authenticated user
            $user->category_id = $categoryId; // Update the category_id field
            $user->save(); // Save changes to the database
            session()->forget('category_id');
        }
        return response()->json(['message' => 'Category ID saved successfully', 'category_id' => $categoryId]);
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
