<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function user() {
        return response()->json(User::with('profiles')->find(Auth::id()));
    }

    /**
     * @param Request $request
     * 
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout(Request $request) {
        $user = auth('api')->user();

        if(!$user) {
            return response()->json([
                'message' => 'User not found.'
            ], 404);
        }

        auth()->logout();
        
        return response()->json([
            'message' => 'User logged out.'
        ]);
    }

    /**
     * @param CreateUserRequest $request
     * 
     * @return \Illuminate\Http\JsonResponse
     */
    public function register(CreateUserRequest $request) {
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ]);
        
        return response()->json([
            'message' => 'User created.'
        ]);
    }
}
