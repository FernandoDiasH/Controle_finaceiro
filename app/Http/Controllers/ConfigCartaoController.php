<?php

namespace App\Http\Controllers;

use App\Models\ConfigCartao;
use Illuminate\Http\Request;

class ConfigCartaoController extends Controller
{
    public function store(Request $request, ConfigCartao $configCartao){
        return $configCartao->store($request->all());
    }
}
