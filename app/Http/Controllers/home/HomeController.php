<?php

namespace App\Http\Controllers\home;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * List all products
     *
     * @return View
     */
    public function index()
    {
        $products = Product::latest()->paginate(12);
        return view('index',)->with('products', $products);
    }
}
