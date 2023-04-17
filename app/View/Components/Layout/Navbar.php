<?php

namespace App\View\Components\Layout;

use Closure;
use App\Models\Cart;
use App\Models\Category;
use Illuminate\Support\Arr;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

class Navbar extends Component
{
    public array $navigationItems = [];
    public int $cartTotal = 0;
    public $categories;
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $this->cartTotal = Cart::getTotal() ?? 0;
        $this->categories = Category::get(['id','name'])->toArray();
        if (auth()->user()) {
            $this->navigationItems = [
                ['label' => 'Cart', 'href' => route('cart.show'), 'fa-pikto' => 'fa-solid fa-cart-shopping'],
                ['label' => 'Logout', 'href' => route('logout')],
                ['label' => 'Products', 'href' => '/', 'dropdown' => true, 'items' => $this->categories],
            ];
        } else {
            $this->navigationItems = [
                ['label' => 'cart', 'href' => route('cart.show'), 'fa-pikto' => 'fa-solid fa-cart-shopping'],
                ['label' => 'register', 'href' => route('register')],
                ['label' => 'login', 'href' => route('login')],
                ['label' => 'Products', 'href' => '/', 'dropdown' => true, 'items' => $this->categories],
            ];
        }
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.layout.navbar');
    }
}
