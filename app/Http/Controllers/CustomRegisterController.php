<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class CustomRegisterController extends Controller
{
    public function index()
    {
        return view("auth.register");
    }

    public function register(RegisterRequest $request)
    {
        $data = $request->validated();

        $user = User::create([
            "name" => $data["name"],
            "email" => $data["email"],
            "password" => $data["password"]
        ]);

        Auth::login($user);

        return redirect()->route("todo.index");
    }
}
