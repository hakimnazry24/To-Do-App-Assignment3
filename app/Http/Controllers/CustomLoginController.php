<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Models\User;
use Hash;
use Illuminate\Support\Facades\Auth;

class CustomLoginController extends Controller
{
    public function index() {
        return view ("auth.login");
    }

    public function login(LoginRequest $request) {
        $data = $request->validated();

        $user = User::where("email", "=", $data["email"])->first();

        if ($user && Hash::check($data["password"], $user->password)) {
            Auth::login($user);
            return redirect()->route("todo.index");
        } else {
            return redirect()->back();
        }
       
    }    
}
