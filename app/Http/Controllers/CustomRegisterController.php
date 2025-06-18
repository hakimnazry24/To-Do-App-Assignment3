<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class CustomRegisterController extends Controller
{
    public function index()
    {
        return view("auth.register");
    }

    public function register(RegisterRequest $request)
    {
        $data = $request->validated();
        $salt = Str::random(16);
        $saltedPasword = $data["password"] . $salt;

        $user = User::create([
            "name" => $data["name"],
            "email" => $data["email"],
            "password" => Hash::make($saltedPasword),
            "salt" => $salt
        ]);

        Auth::login($user);

        return redirect()->route("todo.index");
    }
}
