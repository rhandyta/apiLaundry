<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{

    public function register(RegisterRequest $request)
    {
        $data = User::Create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        $token = $data->createToken('auth_token')->plainTextToken;
        return response()->json(['success' => true, 'code' => 201, 'data' => $data, 'type_token' => 'Bearer', 'token' => $token]);
    }

    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|min:3'
        ]);
        if ($validator->fails()) {
            return response()->json(['success' => false, 'message' => $validator->errors()], 401);
        }
        if (!Auth::attempt($request->only('email', 'password'))) {
            return response()->json(['success' => false, 'message' => 'You Unauthrized'], 401);
        }
        User::where('email', $request->email)->firstOrFail();
        $user = UserResource::make($request->user());
        $token = $user->createToken('auth_token')->plainTextToken;
        return response()->json(['success' => true, 'user' => $user, 'type_token' => 'Bearer', 'token' => $token]);
    }


    public function logout()
    {
        auth()->user()->tokens()->delete();
        return response()->json(['success' => true, 'message' => 'you are loggout'], 200);
    }
}
