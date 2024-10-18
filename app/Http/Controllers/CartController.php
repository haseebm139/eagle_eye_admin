<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Cart;

class CartController extends Controller
{
    public function addToCart(Request $request)
    {


        // return $request->all();
        $product = Product::with('image')->find($request->product_id);
        $product_name = $product->name??'';
        $product_price = number_format($product->is_discount ? $product->sell_price : $product->cost_price, 2);
        $additional_file = null;
        if ($request->hasFile('additional_file')) {
            $file = $request->file('additional_file');
            $img = time() . '_' . $file->getClientOriginalName();
            $file_path = "documents/additional_files/" . $img;
            $file->move(public_path("documents/additional_files/"), $img);
            $additional_file =$file_path;
        }
        // Add the item to the cart
        \Cart::add(array(
            'id' => $request->product_id,
            'name' => $product_name,
            'quantity' => $request->qty,
            'price' => $product_price, // Store as numeric
            'attributes' => array(
                'height' => $request->height,
                'width' => $request->width,
                'material' => $request->material,
                'printed_sides' => $request->printed_sides,
                'flute_direction' => $request->flute_direction,
                'special_instructions' => $request->special_instructions,
                'additional_file_notes' => $request->additional_file_notes,
                'additional_file' => $additional_file, // Use the stored file path
            )
        ));
        return redirect()->route('home')->with(array('message'=>'Item added to cart successfully!','type'=>'success'));
    }

}
