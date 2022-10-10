<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;
use App\Models\Usuario;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
   public function store(UserRequest $request, user $user ){
    $data = $request->validated();
    $data['password'] = Hash::make($data['password']);
    return $user->createUsuario($data);
   }

}
