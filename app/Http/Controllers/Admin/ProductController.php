<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\Models\Product;
use App\Models\ProductImage;
class ProductController extends Controller
{
    public function uploadProduct(Request $request){
        $validator = Validator::make($request->all(), [
            'category' => 'required|string|max:255',
            'cost_price' => 'required|numeric|min:0',
            'date' => 'required|date',
            'discount' => 'nullable|string', // Adjust validation as necessary
            'discount2' => 'nullable|string', // Adjust validation as necessary
            'expiry_date' => 'nullable|string', // Adjust validation as necessary
            'status' => 'required|string',
            'image' => 'array',
            'image.*' => 'image|mimes:jpeg,png,jpg|max:2048', // Validate images
            'long_description' => 'required|string',
            'name' => 'required|string|max:255',
            'sell_price' => 'required|numeric|min:0',
            'short_description' => 'nullable|string',
            'stock' => 'required|integer|min:0',
            'time' => 'required|string', // Consider more specific validation if necessary
        ]);

        // Check if validation fails
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validator->errors()->first()
            ]); // Unprocessable Entity
        }

        try {
            $productData = $request->except(['discount','discount2','image','expiry_date']); // Exclude discount2
            $productData['is_discount'] = $request->discount === 'on' ? '1' : '0';
            $productData['is_discount2'] = $request->discount2 === 'on' ? '1' : '0';
            $productData['is_expire'] = $request->expiry_date === 'on' ? '1' : '0';


            $product = Product::create($productData);
            if ($request->hasFile('image')) {

                foreach ($request->file('image') as $file) {
                    // // Generate a unique filename
                    // $filename = time().'_'.$file->getClientOriginalName();


                    // $path = $file->move(public_path('images'),$filename);
                    // dd($path);

                    $img = time().$file->getClientOriginalName();
                    $file_path = "documents/products/".$img;
                    $file->move(public_path("documents/products/"), $img);
                    $path = $file_path;
                    ProductImage::create([
                        'product_id' => $product->id,
                        'path' => $path,
                        'status' => 1, // Set the status to active by default
                    ]);
                }
            }
            return response()->json(['success' => true, 'message' => 'Product created successfully']);
            //code...
        } catch (\Throwable $th) {
            return response()->json(['success' => false, 'message' => 'Something Went Wrong']);
        }


    }

    public function productList(Request $request){

        $perPage = $request->input('items_per_page', 10);
        $query = Product::query(); // Start a query for the Product model

        // Search functionality
        if ($request->has('search') && !empty($request->search)) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('name', 'LIKE', "%{$search}%")
                  ->orWhere('category', 'LIKE', "%{$search}%")
                  ->orWhere('short_description', 'LIKE', "%{$search}%")
                  ->orWhere('long_description', 'LIKE', "%{$search}%")
                  ->orWhere('cost_price', 'LIKE', "%{$search}%")
                  ->orWhere('sell_price', 'LIKE', "%{$search}%")
                  ->orWhere('stock', 'LIKE', "%{$search}%");
            });
        }

        // Pagination
        $products = $query->paginate($perPage); // This handles pagination for you

        return response()->json([
            'products' => $products->items(),
            'total' => $products->total(),
            'current_page' => $products->currentPage(),
            'last_page' => $products->lastPage(),
        ]);
    }




}
