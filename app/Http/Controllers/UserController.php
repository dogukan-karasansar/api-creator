<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

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
}
