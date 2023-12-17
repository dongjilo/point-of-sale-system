<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index() {

        return view('users.index', [
            'users' => User::all()]);
    }

    public function show(User $user) {
        return view('users.show', [
            'user' =>  $user]);
    }

    public function edit(User $user) {
        return view('users.edit', [
            'user' => $user]);
    }

    public function update(Request $request, User $user) {
        $formFields = $request->all();
        $user->update($formFields);
        return redirect('users');
    }



    public function create() {
        return view('register');
    }

    public function store(Request $request) {
        $userInfo = $request->all();
        $userInfo['user_password'] = bcrypt($userInfo['user_password']);
        User::create($userInfo);
        return redirect('/login');
    }
}
