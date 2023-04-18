<?php

namespace App\View\Components\admin;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class AdminNavbar extends Component
{
    public array $navigationItems = [];
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        if(auth()->user()) {
            $this->navigationItems = [
                ['label' => 'Logout', 'href' => route('admin.logout')],
                ['label' => 'Products', 'href' => route('admin.dashboard')],
                ['label' => 'Orders', 'href' => route('order')],
                ['label' => 'Users', 'href' => route('user')],
                ['label' => 'Main Page', 'href' => route('home')],
            ];

        } else {
            $this->navigationItems = [
                ['label' => 'Login', 'href' => '/admin/']
            ];

        }
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.admin.admin-navbar');
    }
}
