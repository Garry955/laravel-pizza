<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
        ]);

        $formFields = [
            'customer_name' => $request->name,
            'customer_email' => $request->email,
            'customer_phone' => $request->phone,
            'cart_items' => $request->cartItems,
            'order_total' => $request->totalPrice
        ];
        // dd($request->all());
        $order = Order::create($formFields);

        $cartItems = json_decode($order->cart_items);
        // $cartItems = $order->cart_items;
        // dd(is_array($cartItems));
        // foreach($cartItems as $item) {
        //     dd($item->id);

        // }
        return view('cart.success')->with(['order' => $order, 'cartItems' => $cartItems, 'message' => 'Successfully ordered.']);
    }
}
