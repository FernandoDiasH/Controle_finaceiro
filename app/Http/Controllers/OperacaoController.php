<?php

namespace App\Http\Controllers;

use App\Http\Requests\OperacaoRequest;
use App\Models\Operacao;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OperacaoController extends Controller
{
    public function createOperacao (OperacaoRequest $request, Operacao $operacao ){
        if(Auth::check()){
            $data = $request->validated();
            $data['user_id'] = Auth::id();
            return $operacao->createOperacao($data);
            
        }else{
            return 'Você nao esta logado';
        }


    }

    public function getOperacao(Request $request, Operacao $operacao){
        return $operacao->getOperacao($request);
    }

    public function updateOperacao(Request $request, Operacao $operacao){
        return $operacao->updateOperacao($request);
    }

    public function getOperacaoID(Operacao $operacao, $id, Request $request){
        return $operacao->getOperacaoID($request, $id);
    }
}
