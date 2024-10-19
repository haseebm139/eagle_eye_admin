<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Order;
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
    public function customersView($id){
        $data['user'] = User::with('orders')->find($id);
        if ($data['user']) {
            # code...
            $data['orders'] = Order::get();
            $data['totalAmount'] = Order::sum('total');
            $data['all_order_count'] = Order::count();
            $data['order_pending'] = Order::where('status',0)->count();
            $data['order_complete'] = Order::where('status',1)->count();
            $data['order_delivered'] = Order::where('status',2)->count();
            $data['order_cancel'] = Order::where('status',3)->count();
            $data['order_return'] = Order::where('status',4)->count();
            $data['order_shipped'] = Order::where('status',5)->count();
            // return $data;
            return view('admin.pages.customer_view',compact('data'));
        }
        return redirect()->back()->with(array('message'=>'Invalid User','type'=>'error'));

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

    public function employees(Request $request){
        $perPage = $request->input('items_per_page', 10);

        // Start a query for the Product model
        $query = User::where('type', '=', 'emp');

        // Search functionality
        if ($request->has('search') && !empty($request->search)) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('name', 'LIKE', "%{$search}%")
                ->orWhere('email', 'LIKE', "%{$search}%")
                ->orWhere('country', 'LIKE', "%{$search}%")
                ->orWhere('city', 'LIKE', "%{$search}%")
                ->orWhere('job_title', 'LIKE', "%{$search}%")
                ->orWhere('employee_id', 'LIKE', "%{$search}%")
                ->orWhere('state', 'LIKE', "%{$search}%");

            });
        }

        // Pagination
        $user = $query->paginate($perPage); // This handles pagination

        return response()->json([
            'user' => $user->items(),
            'total' => $user->total(),
            'current_page' => $user->currentPage(),
            'last_page' => $user->lastPage(),
        ]);
    }
}

