<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\CartProduct;
use Cart;
use Str;
class CartController extends Controller
{
    public function addToCart(Request $request)
    {

        try {
            $product = Product::with('image')->find($request->product_id);
            $product_name = $product->name??'';
            $product_image = $product->image->path??'';
            $global_value = $product->global_value;
            $base_price = $product->is_discount ? $product->sell_price : $product->cost_price;
            $extra_price = $base_price * ($global_value / 100);
            $increased_price = $base_price + $extra_price;
            $product_price = number_format($increased_price, 2);
            $additional_file = null;
            if ($request->hasFile('additional_file')) {
                $file = $request->file('additional_file');
                $img = time() . '_' . $file->getClientOriginalName();
                $file_path = "documents/additional_files/" . $img;
                $file->move(public_path("documents/additional_files/"), $img);
                $additional_file =$file_path;
            }
            // Add the item to the cart
            if (!$product) {
                return response()->json(['success' => false, 'message' => 'Product not found.']);
            }
            if ($request->qty < $product->min_order_value) {
                return response()->json(['success' => false, 'message' => 'Quantity must be greater than or equal to the minimum order value of ' . $product->min_order_value]);
            }
            \Cart::add(array(
                'id' => $request->product_id,
                'name' => $product_name,
                'quantity' => $request->qty,
                'price' => $product_price, // Store as numeric
                'attributes' => array(
                    'min_order_value' => $product->min_order_value,
                    'image' => $request->product_image,
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
            $user_id =auth()->id()??0;
            $db_cart_item = CartProduct::where('product_id',$request->product_id)->where('user_id',$user_id)->first();
            if ($db_cart_item ) {
                $db_cart_item->quantity = $request->qty;
                $db_cart_item->update();
            }else{

                CartProduct::create([
                    'product_id' => $request->product_id,
                    'user_id' => $user_id,
                    'name' => $product_name,
                    'quantity' => $request->qty,
                    'price' => $product_price,
                    'min_order_value' => $product->min_order_value,
                    'image' => $request->product_image,
                    'height' => $request->height,
                    'width' => $request->width,
                    'material' => $request->material,
                    'printed_sides' => $request->printed_sides,
                    'flute_direction' => $request->flute_direction,
                    'special_instructions' => $request->special_instructions,
                    'additional_file_notes' => $request->additional_file_notes,
                    'additional_file' => $additional_file,
                ]);
            }
            return redirect()->route('home')->with(array('message'=>'Item added to cart successfully!','type'=>'success'));
            //code...
        } catch (\Throwable $th) {
            return redirect()->back()->with(array('message'=>'Something Went Worng','type'=>'error'));
        }
    }
    public function updateCart(Request $request)
    {
        try {
            //code...
            $itemId = $request->input('id');
            $newQuantity = $request->input('quantity');

            // Find the item in the cart by ID
            $cartItem = \Cart::get($itemId);
            $user_id = auth()->id();
            if ($cartItem) {

                $minOrderValue = $cartItem->attributes->min_order_value;


                if ($newQuantity < $minOrderValue) {
                    return response()->json([
                        'success' => false,
                        'message' => 'Quantity must be greater than or equal to the minimum order value of ' . $minOrderValue
                    ]);
                }
                $db_cart_item = CartProduct::where('product_id',$itemId)->where('user_id',$user_id)->first();
                // Update the quantity of the item in the cart
                \Cart::update($itemId, array(
                    'quantity' => array(
                        'relative' => false, // Update with absolute value
                        'value' => $newQuantity
                        )
                    ));

                if (isset($db_cart_item) ) {
                    $db_cart_item->quantity = $newQuantity;
                    $db_cart_item->save();
                }
                $data['cart'] = \Cart::getContent();
                $data['cartTotal'] =\Cart::getSubTotal();
                // Optionally, you can return the updated cart or success message
                return response()->json(['success' => true, 'message' => 'Cart updated successfully','data'=>$data ]);
            }

            return response()->json(['success' => false, 'message' => 'Item not found in cart']);
        } catch (\Throwable $th) {
            return response()->json(['success' => false, 'message' => 'Something Went Wrong']);
        }
    }

    public function removeFromCart(Request $request)
    {
        try {
            //code...
            $itemId = $request->input('id');
            $user_id = auth()->id();
            // Remove the item from the cart
            \Cart::remove($itemId);
            $db_cart_item = CartProduct::where('product_id',$itemId)->where('user_id',$user_id)->first();
            if ($db_cart_item ) {
                $db_cart_item->delete();
            }
            // Optionally, return the updated cart or a success message
            return response()->json(['success' => true, 'message' => 'Item removed from cart']);
        } catch (\Throwable $th) {
            return response()->json(['success' => false, 'message' => 'Something Went Wrong']);
        }
    }
    public function placeOrder(Request $request){
        $user_id = auth()->id();
        $create_order = $this->createOrder($request);
        $order_id = $create_order->id??1;
        $create_item = $this->createItem($order_id);
        \Cart::clear();
        $db_cart_item = CartProduct::where('user_id',$user_id)->get();
        if (isset($db_cart_item[0]) ) {
            foreach ($db_cart_item as $item) {
                $item->delete();
            }

        }
        return redirect()->route('home')->with(array('message'=>'Order Place Successfully!','type'=>'success'));
        try {
            //code...
        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->route('home')->with(array('message'=>'Something Went Wrong','type'=>'error'));
        }
    }
    public function createItem($order_id){

        $cart = \Cart::getContent();
        foreach ($cart as $key => $value) {
            // dd($value->id);
            $product_id = $value->id??0;
            $product = Product::with('image')->find($product_id);
            // dd($value->attributes->height);
             if ($product) {

                $data = OrderItem::create([
                    'order_id'=>$order_id??'',
                    'product_id'=>$product_id??0,
                    'name'=>$product->name,
                    'image'=>$product->image->path??'',
                    'qty'=>$value->quantity??0,
                    'price'=>$value->price??0,
                    'height'=>$value->attributes->height,
                    'width'=>$value->attributes->width,
                    'material'=>$value->attributes->material,
                    'printed_sides'=>$value->attributes->printed_sides,
                    'special_instructions'=>$value->attributes->special_instructions,
                    'additional_file_notes'=>$value->attributes->additional_file_notes,
                    'additional_file'=>$value->attributes->additional_file,
                ]);
            }
        }
        return true;

    }
    public function createOrder($form){

        $user_id = auth()->id();
        // Generate a unique order number
        $order_number = Str::random(8); // Generate an 8-character random string
        $cart = \Cart::getContent();

        $cart_qty = \Cart::getTotalQuantity();
        $subtotal =  Cart::getTotal();
        $rush_service_charges = $form->rush_service_charges??0.00;
        $shipping_rate = $form->shipping_rate??0.00;
        $total_amount = $subtotal + $shipping_rate + $rush_service_charges;
        // Check for uniqueness
        while (Order::where('order_number', $order_number)->exists()) {
            $order_number = Str::random(8); // Regenerate if it already exists
        }
        $data = Order::create([
            'user_id'=>$user_id,
            'order_number'=>$order_number ,
            'first_name'=>$form->first_name,
            'last_name'=>$form->last_name,
            'company_name'=>$form->company_name,
            'country'=>$form->country,
            'state'=>$form->state,
            'city'=>$form->city,
            'address'=>$form->streetone,
            'address1'=>$form->streettwo    ,
            'postcode'=>$form->postcode,
            'phone'=>$form->phone,
            'email'=>$form->email,
            'location'=>$form->location,
            'description'=>$form->description,
            'rush_service_charges'=>$rush_service_charges,
            'shipping_rate'=>$shipping_rate,
            'subtotal'=>$subtotal,
            'total'=>$total_amount,
            'total_qty'=>$cart_qty,
            'total_item'=>count($cart),
            'payment_method'=>$form->pay_type,

        ]);
        return $data;
    }
}
