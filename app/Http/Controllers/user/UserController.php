<?php

namespace App\Http\Controllers\user;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{

    public function index()
    {
        $users = User::latest()->paginate(30);
        return view('user.index')->with(['users'=>$users]);
    }

    public function create()
    {
        return view('user.create');
    }

    public function store(Request $request)
    {
        //Validation
        $formFields = $request->validate([
            'name' => 'required|min:6',
            'email' => 'required|email',
            'password' => 'required|confirmed'
        ]);
        $formFields['is_admin'] = $request->admin;
        User::create($formFields);

        return redirect()->back()->with('message', 'User created successfully');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->back()->with('message', $user->id . ' - ' . $user->name . ' was deleted successfully.');
    }

    public function edit(User $user)
    {
        return view('user.edit')->with(['user' => $user]);
    }

    public function update(User $user, Request $request)
    {
        $formFields = $request->validate([
            'name' => 'required|min:6',
            'email' => 'required|email',
        ]);
        $formFields['phone'] = $request->phone;
        $formFields['is_admin'] = $request->is_admin;

        $user->update($formFields);

        return redirect()->back()->with('message','Product updated successfully');
    }
}
