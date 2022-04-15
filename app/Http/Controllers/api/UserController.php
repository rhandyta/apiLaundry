<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index($id)
    {
        $user = User::findOrFail($id)->get();
        return UserResource::collection($user);
    }

    public function show(User $user)
    {
        return UserResource::make($user);
    }
}
