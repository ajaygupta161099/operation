<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class NewController extends Controller
{
    public function register(Request $request)
    {
        $user = new User;
        $user->username = $request->username;
        $user->password = \Hash::make($request->password);
        $user->save();
        $token = $user->createToken('Token')->accessToken;
        return response()->json(['token' => $token, 'user' => $user], 200);
    }
       public function login(Request $request)
    {
        $data = [
            'username' => $request->username,
            'password' => $request->password
        ];

        if (auth()->attempt($data)) {
            $token = auth()->user()->createToken('Token')->accessToken;
            return response()->json(['token' => $token], 200);
        } else {
            return response()->json(['error' => 'unauthorized'], 401);
        }
    }


}
