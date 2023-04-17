<?php

namespace App\View\Components\Layout;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Navbar extends Component
{
    public array $navigationItems = [];
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        if (auth()->user()) {
            $this->navigationItems = [
                ['label' => 'cart', 'href' => route('home'), 'fa-pikto' => 'fa-solid fa-cart-shopping'],
                ['label' => 'logout', 'href' => route('logout')],
                ['label' => 'menu_1', 'href' => route('home')],
                ['label' => 'menu_2', 'href' => route('home')],
            ];
        } else {
            $this->navigationItems = [
                ['label' => 'cart', 'href' => route('home'), 'fa-pikto' => 'fa-solid fa-cart-shopping'],
                ['label' => 'register', 'href' => route('register')],
                ['label' => 'login', 'href' => route('login')],
                ['label' => 'menu_1', 'href' => route('home')],
                ['label' => 'menu_2', 'href' => route('home')],
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
