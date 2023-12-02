<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Tymon\JWTAuth\Facades\JWTAuth;

class UserController extends Controller
{
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'departament' => 'required|string|max:255',
            'phone' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }

        $status = $request->input('status', true);

        $user = User::create([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'password' => Hash::make($request->get('password')),
            'departament' => $request->get('departament'),
            'phone' => $request->get('phone'),
            'status' => $status,
        ]);

        if (!$user) {
            return response()->json(['error' => 'Error al crear el usuario'], 500);
        }
        
        $token = JWTAuth::attempt($request->only('email', 'password'));
        
        return response()->json(['user' => $user, 'token' => $token], 201);
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        try {
            if (! $token = JWTAuth::attempt($credentials)) {
                return response()->json(['error' => 'Credenciales inválidas'], 401);
            }
        } catch (\Exception $e) {
            return response()->json(['error' => 'No se pudo crear el token'], 500);
        }

        return response()->json(['token' => $token]);
    }

    public function logout()
    {
        Auth::logout();

        return response()->json(['message' => 'Usuario cerró sesión exitosamente']);
    }
}
