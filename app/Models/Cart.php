<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;

class Cart extends Model
{
    use HasFactory;

    protected $fillable = ['customer_id'];

    public function customer() {
        return $this->belongsTo(Customer::class);
    }

    public static function getTotal() {
        $total = 0;
        $customer_id = auth()->user() ? auth()->user()->id : Session::getId();
        $cartID = Cart::where('customer_id', $customer_id)->first()?->id;
        $cartItems = CartDetail::where('cart_id', $cartID)->get('quantity');
        foreach($cartItems as $items) {
            $total += $items->quantity;
        }
        return $total;
    }
}
