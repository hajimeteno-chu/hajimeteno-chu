<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserController extends Controller
{

    public function login(Request $request)
    {
        $name = $request->get("name");
        $password = $request->get("password");
        $user = User::where("name",$name)->first();
        if ($user && Hash::check($password, $user->password)) {
            $token = Str::random(32);
            $user->remember_token = $token;
            $user->save();
            return [
                "token" => $token,
                "user" => $user
            ];
        }else{
            abort(401);
        }
    }

    public function logout(Request $request)
    {
        $token = $request->bearerToken();
        $user = User::where("remember_token",$token)->first();
        if ($token && $user) {
            $user->remember_token = null;
            $user->save();
            return [];
        }else{
            abort(401);
        }
    }

    public function index(Request $request)
    {
        $token = $request->bearerToken();
        if (empty($token)) {
            abort(401);
        }
        $user = User::where("remember_token", $token)->first();
        if (!empty($user)) {
            return [
                "user" => $user,
            ];
        } else {
            abort(401);
        }
    }
}
