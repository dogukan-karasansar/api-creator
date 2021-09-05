<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request) {

        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        $credentials = request(['email', 'password']);
        if(Auth::attempt($credentials) && Auth::user()->role === "admin") {
            return view("admin.dashboard");
        } else {
            return back()->with("errors", "Hatalı Giriş");
        }
    }
}
