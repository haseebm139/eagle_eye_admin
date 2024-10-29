<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\Category;
use App\Models\ProductCategory;

use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Reader\Exception;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
class ProductController extends Controller
{
    public function showUploadForm()
    {
        return view('upload_product');
    }
    public function uploadProducts(Request $request)
    {
        // Validate file input
        $request->validate([
            'file' => 'required|mimes:csv,txt|max:2048',
        ]);

        // Handle file upload
        $file = $request->file('file');

        // Use PhpSpreadsheet to read the CSV
        try {
            $reader = IOFactory::createReaderForFile($file->getRealPath());
            $spreadsheet = $reader->load($file->getRealPath());
            $worksheet = $spreadsheet->getActiveSheet();
            $rows = $worksheet->toArray();

            // Get the header row (first row)
            $headers = $rows[0];

            // Start from the second row (skip the header row)
            foreach ($rows as $index => $row) {
                if ($index == 0) {
                    continue; // Skip header
                }

                // Map fields using header names
                $data = array_combine($headers, $row);
                // Handle multiple categories
                $categories = explode(',', $data['Categories']); // Split by comma
                $categoryString = implode(', ', array_map('trim', $categories)); // Trim spaces and joi
                // Generate a slug from the product name
                $name = $data['Name'];
                $slug = Str::slug($name);
                $category = Category::where('name',$data['Categories'])->first();

                // Check if the slug already exists
                $originalSlug = $slug;
                $count = 1;

                // Loop until we find a unique slug
                while (Product::where('slug', $slug)->exists()) {
                    $slug = $originalSlug . '-' . $count;
                    $count++;
                }
                // Insert product data into the database
                $product = Product::create([
                    'name' => $name, // Product name
                    'slug' => $slug, // Generated slug
                    'category' => $categoryString, // Assuming category field is "Category"
                    'cost_price' => $data['Regular price'], // Assuming cost price field is "Cost Price"
                    'sell_price' => $data['Sale price'], // Assuming sell price field is "Sell Price"
                    'stock' => $data['Stock'], // Assuming stock field is "Stock"
                    'short_description' => $data['Short description'], // Assuming short description field is "Short Description"
                    'long_description' => $data['Description'], // Assuming long description field is "Long Description"
                    'time' => now()->toTimeString(),
                    'date' => now()->toDateString(),
                    'is_discount' => 0, // Default value
                    'is_discount2' => 0, // Default value
                    'is_expire' => 0, // Default value
                    'status' => '1', // Default published status
                ]);
                // Handle categories

                foreach ($categories as $categoryName) {
                    $categoryName = trim($categoryName);
                    $category = Category::where('name',$categoryName)->first();
                    if ($category) {
                        // Insert category-product relationship into product_categories table
                        ProductCategory::create([
                            'category_id' => $category->id,
                            'product_id' => $product->id,
                        ]);

                    }
                }
                // Handle image URLs
                $imageUrl = $data['Images']; // Assuming the image URL field is "Image"
                if (!empty($imageUrl)) {
                    $imageName = basename($imageUrl);
                        // Insert image data into the product_images table
                        ProductImage::create([
                            'product_id' => $product->id,
                            'path' => 'documents/products/' . $imageName, // Store relative path
                            'status' => 1, // Active image
                        ]);

                }
            }

            return redirect()->back()->with('success', 'Products uploaded successfully.');
        } catch (Exception $e) {
            dd($e);
            return redirect()->back()->with('error', 'Error uploading file: ' . $e->getMessage());
        }
    }
    public function uploadProduct(Request $request){
        $validator = Validator::make($request->all(), [
            'category_id' => 'required',
            'cost_price' => 'required|numeric|min:0',
            'date' => 'nullable|date',
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
            'time' => 'nullable|string', // Consider more specific validation if necessary
        ]);

        // Check if validation fails
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validator->errors()->first()
            ]); // Unprocessable Entity
        }
        try {
            $productData['slug'] = Str::slug($request->name); // Generate slug
            $productData = $request->except(['discount', 'discount2', 'image', 'expiry_date', 'min_order', 'min_order_value','category_id']);
            $productData['is_discount'] = $request->discount === 'on' ? '1' : '0';
            $productData['is_discount2'] = $request->discount2 === 'on' ? '1' : '0';
            $productData['is_expire'] = $request->expiry_date === 'on' ? '1' : '0';

            if ($request->min_order === 'on') {
                $productData['is_min_orders'] = 1; // Marking min_order as enabled
                $productData['min_order_value'] = $request->min_order_value;
            } else {
                $productData['is_min_orders'] = 0; // Marking min_order as disabled
                $productData['min_order_value'] = 1; // No minimum order value if min_order is off
            }

            $product = Product::create($productData);
            if ($request->hasFile('image')) {

                foreach ($request->file('image') as $file) {

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
            if ($request->category_id) {
                ProductCategory::create([
                    'product_id' => $product->id,
                    'category_id' => $request->category_id,
                ]);

            }
            return response()->json(['success' => true, 'message' => 'Product created successfully']);

            //code...
        } catch (\Throwable $th) {
            return response()->json(['success' => false, 'message' => 'Something Went Wrong']);
        }


    }

    public function updateProduct(Request $request){


        try {
            $productId = $request->product_id??0;
            $product = Product::find($productId);

            // If product is not found, return an error response
            if (!$product) {
                return response()->json(['success' => false, 'message' => 'Product not found']);
            }
            $productData['slug'] = Str::slug($request->name); // Generate slug

            $productData = $request->except(['discount', 'discount2', 'image', 'expiry_date', 'min_order', 'min_order_value','product_id','category_id']);
            $productData['is_discount'] = $request->discount === 'on' ? '1' : '0';
            $productData['is_discount2'] = $request->discount2 === 'on' ? '1' : '0';
            $productData['is_expire'] = $request->expiry_date === 'on' ? '1' : '0';

            if ($request->min_order === 'on') {
                $productData['is_min_orders'] = 1; // Marking min_order as enabled
                $productData['min_order_value'] = $request->min_order_value;
            } else {
                $productData['is_min_orders'] = 0; // Marking min_order as disabled
                $productData['min_order_value'] = 1; // No minimum order value if min_order is off
            }

            $product->update($productData);
            if ($request->hasFile('image')) {

                foreach ($request->file('image') as $file) {

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
            if ($request->category_id) {
                $prod_cate = ProductCategory::where('product_id', $productId)
                    ->where('category_id', $request->category_id)
                    ->first();
                if (!$prod_cate) {

                    ProductCategory::where('product_id', $productId)->delete();


                    ProductCategory::create([
                        'product_id' => $productId,
                        'category_id' => $request->category_id,
                    ]);
                }
            }
            return response()->json(['success' => true, 'message' => 'Product Update successfully']);

            //code...
        } catch (\Throwable $th) {
            return response()->json(['success' => false, 'message' => 'Something Went Wrong']);
        }


    }

    public function productList(Request $request){

        $perPage = $request->input('items_per_page', 10);

        // Start a query for the Product model
        $query = Product::with('images')->where('status', '!=', 0);

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
        $products = $query->paginate($perPage); // This handles pagination

        return response()->json([
            'products' => $products->items(),
            'total' => $products->total(),
            'current_page' => $products->currentPage(),
            'last_page' => $products->lastPage(),
        ]);
    }

    public function updateStatus(Request $request,$id){
        try {
            //code...
            $product = Product::findOrFail($id);
            // Change status based on the action
            $product->status = $request->status??$product->status;


            $product->save();

            return response()->json(['success' => true, 'message' => 'Product status updated successfully']);
        } catch (\Throwable $th) {
            return response()->json(['success' => false, 'message' => 'Something went worng']);
        }
    }


    public function updateGlobalPrice(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'global_price_variable' => 'required|numeric|min:0|max:100'
        ]);

        // Check if validation fails
        if ($validator->fails()) {
            return redirect()->back()->with(array('message'=>$validator->errors()->first(),'type'=>'error'));
        }
        $request->validate([
            'global_price_variable' => 'required|numeric'
        ]);
        $globalPriceVariable = $request->global_price_variable;


        // Fetch all products and update their prices
        $products = Product::all();
        foreach ($products as $product) {
            $product->global_value = $globalPriceVariable;
            $product->save();
        }

        return redirect()->back()->with(array('message'=>'Global price variable applied to all products successfully!','type'=>'success'));
    }

    public function productEdit($id){
        try {
            //code...
            $product = Product::with(['categories', 'images'])->where('id', $id)->firstOrFail();
            if (!isset($product)) {

                return redirect()->back()->with(array('message'=>'Product Not Found','type'=>'error'));
            }
            $categories = Category::all();
            return view('admin.pages.product_edit',compact('product','categories'));
        } catch (\Throwable $th) {
            return redirect()->back()->with(array('message'=>'Something Went Wrong','type'=>'error'));
        }
    }

    public function deleteProduct($id){
        try {
            //code...
            $product = Product::where('id', $id)->firstOrFail();
            if (!isset($product)) {

                return redirect()->back()->with(array('message'=>'Product Not Found','type'=>'error'));
            }
            $product->delete();
            return redirect()->back()->with(array('message'=>'Product Delete Successfully','type'=>'success'));
        } catch (\Throwable $th) {
            return redirect()->back()->with(array('message'=>'Something Went Wrong','type'=>'error'));
        }
    }
}
