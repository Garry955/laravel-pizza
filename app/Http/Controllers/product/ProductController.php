<?php

namespace App\Http\Controllers\product;

use App\Models\Cart;
use App\Models\Product;
use App\Http\Controllers\Controller;
use App\Models\CartDetail;
use App\Models\Category;
use Illuminate\Http\Request;
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

    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->back()->with('message', $product->id . ' - ' . $product->name . ' was deleted successfully.');
    }

    public function edit(Product $product)
    {
        $categories = Category::latest()->get();
        return view('product.edit')->with(['product' => $product->with('category')->first(), 'categories' => $categories]);
    }

    public function create()
    {
        $categories = Category::latest()->get();
        return view('product.create')->with(['categories' => $categories]);
    }

    public function store(Request $request)
    {
        //Validation
        $formFields = $request->validate([
            'name' => 'required|min:6',
            'price' => 'required'
        ]);
        $formFields['category_id'] = $request->category_id;
        Product::create($formFields);

        return redirect()->back()->with('message', 'Product created successfully');
    }

    public function update(Product $product, Request $request)
    {
        $formFields = $request->validate([
            'name' => 'required|min:6',
            'price' => 'required'
        ]);
        $formFields['price'] = $request->price;
        $formFields['category_id'] = $request->category;

        $product->update($formFields);

        return redirect()->back()->with('message', 'Product updated successfully');
    }
}
