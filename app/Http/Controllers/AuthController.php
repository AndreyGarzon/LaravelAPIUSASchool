<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;


class AuthController extends Controller
{
    public function register (Request $request){
        $validatedData = $request->validate([
            'first_name'=> 'required|string|max:255',
            'last_name'=> 'required|string|max:255',
            // 'phone'=> 'required|string|max:20',
            'email'=> 'required|string|email|max:255|unique:users',
            'password'=>'required|string|min:8',
            'state'=>'required|string|max:1'
        ]);

        $user = User::create([
            'first_name'=> $validatedData['first_name'],
            'last_name'=> $validatedData['last_name'],
            // 'phone'=> $validatedData['phone'],
            'email'=> $validatedData['email'],
            'password'=>Hash::make($validatedData['password']),
            'state'=> $validatedData['state'],
        ]);

        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'access_token'=>$token,
            'token_type'=>'Bearer'
        ]);
    }

    public function login(Request $request){
        if(!Auth::attempt($request->only('email','password'))){
            return response()->json([
                'message'=> 'Invalid login details'
            ],status:401);
        }
        $user =User::where('email',$request['email'])->firstOrFail();

        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'access_token'=>$token,
            'token_type'=>'Bearer'
        ]);
        
    }

    public function userinfo(Request $request)
    {
        return $request->user();
    }
}
