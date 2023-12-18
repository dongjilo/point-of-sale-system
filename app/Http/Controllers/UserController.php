<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserSaveRequest;
use App\Models\User;
use Illuminate\Database\QueryException;
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
        try{
            $formFields = $request->all();
            $user->update($formFields);

            session()->forget('error');
            return back()->with('success', 'User updated successfully!');

        }catch (QueryException $ex){
            session()->forget('success');
            return back()->with('error', 'User was not updated successfully.');
        }

    }



    public function create() {
        return view('register');
    }
    public function store(UserSaveRequest $request) {
        session()->forget('error');

        $formFields = $request->all();
        $formFields['user_password'] = bcrypt($formFields['user_password']);
        User::create($formFields);

        return back()->with('success', 'User added successfully!');
    }

    public function destroy(User $user) {
        try{
            $user->delete();
            session()->forget('error');
            return back()->with('success', 'User deleted successfully!');

        }catch (QueryException $ex){
            session()->forget('success');
            if ($ex->getCode() === '23000') {
                return back()->with('error', 'User cannot be deleted, because [User: '.$user->user_name .'] is used elsewhere...');
            }else{
                return back()->with('error', 'User was not deleted successfully.');
            }
        }
    }
}
