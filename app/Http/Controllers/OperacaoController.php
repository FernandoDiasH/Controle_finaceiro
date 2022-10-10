<?php

namespace App\Http\Controllers;

use App\Http\Requests\OperacaoRequest;
use App\Models\Operacao;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OperacaoController extends Controller
{
    public function store (OperacaoRequest $request, Operacao $operacao ){

        $operacao->createOperacao($request->validated());

        return response()->json([
            'response'=>'cadastrado com sucesso'
        ]);
    }

    public function getOperacao(Request $request, Operacao $operacao){
        return $operacao->getOperacao($request);
    }

    public function updateOperacao(Request $request, Operacao $operacao){
        return $operacao->updateOperacao($request);
    }

    public function getOperacaoID(Operacao $operacao, $id, Request $request){
        return $operacao->getOperacaoID($id, $request);
    }
}
