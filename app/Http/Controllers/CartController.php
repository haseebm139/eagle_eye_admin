<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Order;
use App\Models\OrderItem;
use Cart;
use Str;
class CartController extends Controller
{
    public function addToCart(Request $request)
    {


        $product = Product::with('image')->find($request->product_id);
        $product_name = $product->name??'';
        $product_image = $product->image->path??'';
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
        return redirect()->route('home')->with(array('message'=>'Item added to cart successfully!','type'=>'success'));
    }
    public function placeOrder(Request $request){

        $create_order = $this->createOrder($request);
        $order_id = $create_order->id??1;
        $create_item = $this->createItem($order_id);
        return redirect()->route('home')->with(array('message'=>'Order Place Successfully!','type'=>'success'));
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
