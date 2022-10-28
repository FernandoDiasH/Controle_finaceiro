<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LancamentoCredito;
use App\Models\RegistroParcela;

class LancamentoCreditoController extends Controller
{
    public function store(Request $request){
        $lancamento = LancamentoCredito::create($request->all());
        return registrarParcelas($lancamento);
    }

    public function registrarParcelas($lancamento){

    }
}
