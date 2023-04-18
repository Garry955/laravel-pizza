<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function login()
    {
        return view('admin.login');
    }

    public function authenticate(Request $request)
    {
        //Validate fields
        $formFields = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);
        //Check isAdmin
        $user = User::where(['email' => $formFields['email'], 'is_admin' => 1])->first();
        if ($user && Hash::check($formFields['password'], $user->password)) {
            //Attempt user login
            if (auth()->attempt($formFields)) {
                $request->session()->regenerate();
                return redirect(route('admin.dashboard'))->with('message', 'You have been logged in');
            }
        }
        //Show error attempt failed, only after password input
        return back()->withErrors(['password' => 'Invalid credentials'])->onlyInput('password');
    }

    public function logout(Request $request)
    {
        //Logout user
        auth()->logout();
        //Reset session
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        //Redirect
        return redirect('/admin')->with('message', 'You have been logged out');
    }

    public function index()
    {

        $products = Product::latest()->paginate(30);
        ddd($products);
        return view('admin.dashboard')->with(['products' => $products]);
    }
}
