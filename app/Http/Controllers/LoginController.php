<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{

    public function login(Request $request){
        if(Auth::attempt($request->all())){
            $token = auth()->user()->createToken('auth_token');

            return response()->json([
                "token"=>$token->plainTextToken,
                'user_id' => Auth::id()
            ]);
        }else{
           abort(401, 'credenciais invalidas');
        }
    }

    public function logout(){
        //auth()->user()->currentAccessToken()->delete();
        auth()->user()->tokens()->delete();
        return 'deslogado';

    }
}
