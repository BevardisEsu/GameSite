<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use App\Http\Requests\UsersRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        $user = User::query()->with('users');
        return view('users.index');
    }
    public function create(){
        return view('users.create');
    }
    public function store(Request $request){
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;
        if (Auth::user()->role === User::ROLE_ADMIN)
        {
            $user->role = $request->role;
        }
        $user->save();
        return redirect()->route('users.show',$user);
    }
    public function edit(UsersRequest $user){
        return view('users.edit', compact('user'));
    }
    public function update(Request $request, UsersRequest $user){
        $user->update($request->all());
        return redirect()->route('users.show',$user);
    }
    public function destroy(UsersRequest $user){
        $user ->delete();
        return redirect()->route('users.index');
    }
    public function show(UsersRequest $user){
        return view('users.show',['user'=>$user]);
    }

}
