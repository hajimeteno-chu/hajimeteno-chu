<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

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
}
