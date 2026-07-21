<?php

namespace App\Http\Controllers\ApiControllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\StoreCardentialsRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\Mime\Message;

class AuthController extends Controller
{
    // Login
    public function login(Request $request)
    {

        $credentials = $request->only('email' , 'password');
        if(Auth::attempt($credentials)){
            $user = auth()->user();
            $token = $user->createToken('token')->plainTextToken;

            return response()->json([
                'token' => $token,
                'success' => true
            ]);
        }
        else
            return response()->json([
                'message' => 'Invalid Credentials',
                'success' => false
            ] , 401);



    }
    public function register(StoreCardentialsRequest $request)
    {

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        try{

            // Auth::login($user);
            return response()->json([
                'message' => 'User Created Successfully',
                'success' => true
            ]);
        }catch(\Exception $ex){
            return response()->json([
                'message' => 'Failed To Create User'
                ,'success' => false
            ]);
        }

    }
}
