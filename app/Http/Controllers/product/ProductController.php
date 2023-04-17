<?php

namespace App\Http\Controllers\product;

use App\Models\Cart;
use App\Models\Product;
use App\Http\Controllers\Controller;
use App\Models\CartDetail;
use Illuminate\Support\Facades\Session;

class ProductController extends Controller
{
    public function show(Product $product)
    {
        $customer_id = auth()->user()->id ?? Session::getId();
        $cartID = Cart::where('customer_id', $customer_id)->first()?->id;
        $quantity = CartDetail::where([
            ['cart_id', $cartID],
            ['product_id', $product->id]
        ])->first()?->quantity;
        
        return view('product.show')->with([
            'product' => $product,
            'quantity' => $quantity
        ]);
    }
}
