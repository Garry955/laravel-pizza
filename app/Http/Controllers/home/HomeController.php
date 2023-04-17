<?php

namespace App\Http\Controllers\home;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    /**
     * List all products
     *
     * @return View
     */
    public function index(Request $request)
    {
        // dd($request->category);
        // $products = Product::latest()->paginate(12);
        $categoryId = $request->category ?? null;
        $categoryName = Category::find($request->category)?->name ?? null;

        $products = Category::find($categoryId)?->products;

        $products = Product::where('category_id', $categoryId)->get();

        $products = Product::whereHas('category', function ($query) use ($categoryId) {
            $query->where('id', $categoryId);
        })->paginate(12);
        return view('index',)->with(['products' => $products, 'categoryId' => $categoryId, 'categoryName' => $categoryName]);
    }
}
