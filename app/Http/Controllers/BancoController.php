<?php

namespace App\Http\Controllers;

use App\Models\Banco;
use Illuminate\Http\Request;

class BancoController extends Controller
{
    public function store(Request $request, Banco $banco){
        return $banco->store($request->all());
    }
}
