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
    public function customers(){
        return view('admin.pages.customer');
    }
    public function addProduct(){
        return view('admin.pages.add_new_product');
    }

    public function settings(){
        return view('admin.pages.settings');
    }
    public function orders(){
        return view('admin.pages.orders');
    }
    public function orderView(){
        return view('admin.pages.show_order');
    }
    public function updateProfile(Request $request){
        $user = auth()->user();
        $user->name = $request->name??$user->name ;
        $user->last_name = $request->last_name??$user->last_name ;
        $user->phone = $request->phone??$user->phone ;
        $user->country = $request->country ??$user->country;
        $user->state = $request->state??$user->state ;
        $user->city = $request->city??$user->city ;
        $user->address = $request->address??$user->address ;

        // Handle profile image upload
        if ($request->hasFile('profile')) {
            $file = $request->file('profile');
            $img = time() . $file->getClientOriginalName();
            $file_path = "documents/profile/" . $img;
            $file->move(public_path("documents/profile/"), $img);
            $user->profile = $file_path;
        }

        $user->save();

        // Redirect back with a success message
        return redirect()->back()->with(array('message'=>'Profile updated successfully.','type'=>'success'));

    }
}

