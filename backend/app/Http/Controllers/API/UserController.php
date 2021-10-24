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
        $param = $request->q;
        if (empty($param)) {

            // リクエストしたユーザー情報を返す
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

        } else {

            // ユーザーを検索する
            $user = User::where("name", $param)->first();
            if (!empty($user)) {
                return [
                    "user" => $user,
                ];
            } else {
                abort(401);
            }
        }
    }

    public function register(Request $request)
    {
        $name = $request->get("name");
        $password1 = $request->get("password1");
        $password2 = $request->get("password1");
        if ($password1 != $password2) {
            abort(401);
        }
        $user = new User;
        $user->name = $request->get("name");
        $hashPassword = Hash::make($password1);
        $user->password = $hashPassword;
        if (!$user->save()) {
            abort(500);
        }
        return [
            "user" => $user
        ];
    }
}
