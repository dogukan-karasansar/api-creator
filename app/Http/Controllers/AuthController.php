<?php

namespace App\Http\Controllers;

use App\Models\User;
use Carbon\Carbon;
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

        return response()->json(['message' => $this->SUCCCESS_MESSAGE, 'access_token' => $token, 'user' => $user], $this->CREATED_STATUS);


    }

    public function login(Request $request) {

        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        $credentials = request(['email', 'password']);
        if(Auth::attempt($credentials)) {
            $user = Auth::user();
            $token = $user->createToken('authToken')->accessToken;
            $message['token_type'] = 'Bearer';
            $message['experies_at'] = Carbon::parse(Carbon::now()->addWeek(1))->toDateTimeString();
            $message['success'] = 'Kullanıcı Girişi Başarılı';

            return response()->json(['message' => $message, 'access_token' => $token, 'user' => auth()->user()], $this->SUCCCESS_STATUS);
        } else {
            return response(['error' => $this->UNAUTHORISED_MESSAGE], $this->UNAUTHORISED_STATUS);
        }
    }

}
