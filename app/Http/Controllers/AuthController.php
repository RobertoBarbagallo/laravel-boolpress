<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginUser;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(LoginUser $request)

    {

        try {

            $credentials['email'] = $request->input('email');

            $credentials['password'] = $request->input('password');

            if (!Auth::attempt($credentials)) {

                return response()->json([

                    'status' => 401,

                    'message' => 'Unauthorized'

                ]);
            }

            $user = User::where('email', $credentials['email'])->first();

            if (!Hash::check($credentials['password'], $user->password, [])) {

                throw new \Exception('Exception in login');
            }

            $tokenResult = $user->createToken('authToken')->plainTextToken;

            return response()->json([

                'status' => 200,

                'access_token' => $tokenResult,

                'token_type' => 'Bearer',

            ]);
        } catch (\Exception $error) {

            return response()->json([

                'status' => 500,

                'message' => 'Exception in Login',

                'error' => $error,

            ]);
        }
    }
}
