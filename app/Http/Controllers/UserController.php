<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function loginUser(Request $request)
    {
        return response()->json(User::all());
    }

    public function getUserMe(Request $request)
    {
        return response()->json($request->auth);
    }

    public function createUser(Request $request)
    { 
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6'
        ]);
        

        $user = User::create($request->all());

        return response()->json($user, 201);
    }
}