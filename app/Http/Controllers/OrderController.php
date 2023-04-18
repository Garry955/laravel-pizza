<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{

    public function index()
    {
        $orders = Order::latest()->paginate(30);
        return view('order.index')->with(['orders' => $orders]);
    }

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


    public function destroy(Order $order)
    {
        $order->delete();
        return redirect()->back()->with('message', $order->id . ' - ' . $order->name . ' was deleted successfully.');
    }

    public function edit(Order $order)
    {
        return view('order.edit')->with(['order' => $order]);
    }

    public function update(Order $order, Request $request)
    {
        $formFields = $request->validate([
            'customer_name' => 'required|min:6',
            'customer_email' => 'required|email',
            'customer_phone' => 'required|min:6',
            'order_total' => 'required'
        ]);
        // dd($formFields);

        $order->update($formFields);

        return redirect()->back()->with('message', 'Order updated successfully');
    }
}
