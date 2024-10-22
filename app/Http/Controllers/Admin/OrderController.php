<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator; // Import the Validator facade
use App\Models\Order;

class OrderController extends Controller
{
    public function orderCustomer(Request $request){
        $perPage = $request->input('items_per_page', 10);

        // Start a query for the Product model
        $query = Order::query();

        // Search functionality
        if ($request->has('search') && !empty($request->search)) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('order_number', 'LIKE', "%{$search}%")
                ->orWhere('first_name', 'LIKE', "%{$search}%")
                ->orWhere('last_name', 'LIKE', "%{$search}%")
                ->orWhere('phone', 'LIKE', "%{$search}%")
                ->orWhere('email', 'LIKE', "%{$search}%")
                ->orWhere('total_item', 'LIKE', "%{$search}%")
                ->orWhere('total', 'LIKE', "%{$search}%")
                ->orWhere('payment_method', 'LIKE', "%{$search}%")
                ->orWhere('total', 'LIKE', "%{$search}%");
            });
        }

        // Pagination
        $orders = $query->paginate($perPage); // This handles pagination

        return response()->json([
            'orders' => $orders->items(),
            'total' => $orders->total(),
            'current_page' => $orders->currentPage(),
            'last_page' => $orders->lastPage(),
        ]);
    }

    public function newOrders(Request $request){
        $perPage = $request->input('items_per_page', 10);

        // Start a query for the Product model
        $query = Order::query();
        $query->with('customer')->where('status','0')->has('customer') ;
        // Search functionality
        if ($request->has('search') && !empty($request->search)) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('order_number', 'LIKE', "%{$search}%")
                ->orWhere('first_name', 'LIKE', "%{$search}%")
                ->orWhere('last_name', 'LIKE', "%{$search}%")
                ->orWhere('phone', 'LIKE', "%{$search}%")
                ->orWhere('email', 'LIKE', "%{$search}%")
                ->orWhere('total_item', 'LIKE', "%{$search}%")
                ->orWhere('total', 'LIKE', "%{$search}%")
                ->orWhere('payment_method', 'LIKE', "%{$search}%")
                ->orWhere('total', 'LIKE', "%{$search}%");
            });
        }

        // Pagination
        $orders = $query->paginate($perPage); // This handles pagination

        return response()->json([
            'orders' => $orders->items(),
            'total' => $orders->total(),
            'current_page' => $orders->currentPage(),
            'last_page' => $orders->lastPage(),
        ]);
    }


    public function assignedOrders(Request $request){
        $perPage = $request->input('items_per_page', 10);

        // Start a query for the Product model
        $query = Order::query();
        $query->with(['customer','employee'])
        ->where('status','!=','0')
        ->has('customer')
      ->has('employee')
        ;
        // Search functionality
        if ($request->has('search') && !empty($request->search)) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('order_number', 'LIKE', "%{$search}%")
                ->orWhere('first_name', 'LIKE', "%{$search}%")
                ->orWhere('last_name', 'LIKE', "%{$search}%")
                ->orWhere('phone', 'LIKE', "%{$search}%")
                ->orWhere('email', 'LIKE', "%{$search}%")
                ->orWhere('total_item', 'LIKE', "%{$search}%")
                ->orWhere('total', 'LIKE', "%{$search}%")
                ->orWhere('payment_method', 'LIKE', "%{$search}%")
                ->orWhere('total', 'LIKE', "%{$search}%");
            });
        }

        // Pagination
        $orders = $query->paginate($perPage); // This handles pagination

        return response()->json([
            'orders' => $orders->items(),
            'total' => $orders->total(),
            'current_page' => $orders->currentPage(),
            'last_page' => $orders->lastPage(),
        ]);
    }

    public function assignOrdersToEmployee(Request $request){
        $validator = Validator::make($request->all(), [
            'employee_id' => 'required|exists:users,id', // Check that employee_id exists in users table
            'order_id'    => 'required|exists:orders,id', // Check that order_id exists in orders table
        ]);
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validator->errors()->first()
            ]);
        }
        try {
            $employeeId = $request->employee_id;
            $orderId = $request->order_id;
            //code...
            $order = Order::find($orderId);
            if ($order) {
                $order->emp_id = $employeeId; // Assuming your Order model has an employee_id field
                $order->status = '1'; // Assuming your Order model has an employee_id field
                $order->save(); // Save the changes
            }
            return response()->json([
                'success' => true,
                'message' =>'Employee assigned successfully!'
            ]); // Unprocessable Entity
        } catch (\Throwable $th) {
            return response()->json([
                'success' => false,
                'message' => "Something went worng"
            ]); // Unprocessable Entity
        }
    }

    public function cancelOrder(Request $request, $id)
    {
        $order = Order::find($id);

        if ($order) {
            $order->status = '3';
            $order->save();

            return response()->json(['success' => true]);
        }

        return response()->json(['success' => false]);
    }
}
