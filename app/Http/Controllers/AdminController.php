<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function displayDashboard()
    {
        $users = User::with("todos")->get();
        return view("admin.dashboard", ["users" => $users]);
    }
}
