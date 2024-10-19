<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
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
}
