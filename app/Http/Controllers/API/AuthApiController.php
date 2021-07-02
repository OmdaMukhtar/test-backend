<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class AuthApiController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (! Auth::attempt($credentials)) {
            return response()->json([
                'status' => false,
                'message' => 'invalid credentials'
            ], 200);
        }

        $user = tap(Auth::user())->update(['access_token' => base64_encode(Str::random(50))]);
        return response()->json([
            'status' => true,
            'access_token' => $user->access_token
        ], 200);
    }


    public function logout(Request $request)
    {
        User::whereAccessToken($request->access_token)->update(['access_token' => '']);
        return response()->json([
            'status' => false,
            'message' => 'logout successfully',
            'access_token' => null
        ], 200);
    }
}
