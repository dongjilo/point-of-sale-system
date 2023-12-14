<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
     public function index() {
        return view('users.index', [
            'users' => User::all()
        ]);

    }

    public function show(User $user) {
        return view('users.showing', [
            'User' => $user
        ]);
    }

    public function create() {
        return view('user.create');
    }

    public function store(Request $request) {

        $formFields = $request->all();

        User::create($formFields);



        return redirect('user')->with('success', 'User added successfully!');
    }

    public function edit(User $user) {
        return view('user.edit', [
            'user' => $user
        ]);
    }

    public function update(Request $request, User $user) {
        $formFields = $request->all();
        $user->update($formFields);
        return redirect('products');
    }

    public function destroy(User $user) {
        $user->delete();
        return redirect('users');
    }
}
