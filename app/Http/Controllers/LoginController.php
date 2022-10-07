<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{

    public function storeUser(LoginRequest $request, User $user){
        $data = $request->validated();
        $data['password'] = Hash::make($data['password']);
        $user->sotoreUser($data);
        return 'cadastrado com sucesso';
    }

    public function login(Request $request){
        if(Auth::attempt($request->all())){
            return 'logado';
        }else{
            return 'erro';
        }
    }

    public function logout(){
        if(Auth::logout()){
            return "certo";
        }else{
            return "deslogado";
        }
    }

    public function teste(){
        dd(Auth::id());
    }

    public function rotas(){
        return 'teste';
    }

}
