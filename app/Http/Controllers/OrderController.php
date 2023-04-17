<?php

namespace App\Http\Controllers;

use App\Models\Cart;
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
        $order = Order::create($formFields);
        Cart::destroy($request->all()['cartID']);
        // dd($order, $request->all()['cartID']);

        $cartItems = json_decode($order->cart_items);
        return view('cart.success')->with(['order' => $order, 'cartItems' => $cartItems, 'message' => 'Successfully ordered.']);
    }
}
