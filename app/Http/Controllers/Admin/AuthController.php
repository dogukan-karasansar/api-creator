<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
      //Http response
      public $CREATED_STATUS = 201;
      public $SUCCCESS_STATUS = 200;
      public $UNAUTHORISED_STATUS = 401;

      //Response Mesage
      public $SUCCCESS_MESSAGE = 'transaction successful';
      public $UNAUTHORISED_MESSAGE = 'unauthorised transaction';

      /**
       * @param [string] name
       * @param [string] email
       * @param [string] password
       */
      public function register(Request $request) {
          $request->validate([
              'name' => 'required|string',
              'email' => 'required|string|email|unique:users',
              'password' => 'required|string|confirmed',
          ]);

         $user = User::create([
              'name' => $request->name,
              'email' => $request->email,
              'password' => bcrypt($request->password),
              'role' => $request->role,
          ]);

          $token = $user->createToken('authToken')->accessToken;

          return redirect()->back($this->CREATED_STATUS)->with(compact('token', 'user'));
      }

    public function login(Request $request) {

        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        $credentials = request(['email', 'password']);
        if(Auth::attempt($credentials) && Auth::user()->role === "admin") {
            return redirect("admin");
        } else {
            return back()->with("errors", "Hatalı Giriş");
        }
    }
}
