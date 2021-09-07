<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function getUsers()
    {
        $users = User::all();

        return response()->json(['users' => $users]);
    }

    public function getUser($id) {
        $user = User::find($id);

        if(!$user) {
            return response()->json(["warning" => "User Not Found"]);
        }

        return response()->json($user);
    }

    public function getMe(Request $request) {


        $user = auth()->user();

        return response()->json(['user' => $user, 'access_token' => $request->header('Authorization')]);

    }
}
