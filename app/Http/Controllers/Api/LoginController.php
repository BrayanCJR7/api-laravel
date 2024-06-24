<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $this->validateLogin($request);
        if (Auth::attempt($request->only('email', 'password'))) {
            return response()->json([
                'token' => $request->user()->createToken($request->name)->plainTextToken,
                'message' => 'Success'
            ]);
        }
        return response()->json([
            'message' => 'Unauthorized'
        ], 401);
    }

    private function validateLogin(Request $request)
    {
        return $request->validate([
            'email' => 'required|email', //se hace requerido el campo y se pregunta si es un email
            'password' => 'required', //se hace requerido el campo
            'name' => 'required', //se hace requerido el campo, este campo nos dira desde que dispositivo se esta conectando el usuario
        ]);
    }
}
