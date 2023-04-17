<?php

namespace App\Http\Controllers\cart;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    public function addCart(Product $product, Request $request) {
        dd(Session::getId());
        dd($request,$product);
    }
}
