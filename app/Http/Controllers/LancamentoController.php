<?php

namespace App\Http\Controllers;

use App\Http\Requests\LancamentoRequest;
use App\Models\Lancamento;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Throwable;

class LancamentoController extends Controller
{
    public function createLancamento(LancamentoRequest $request, Lancamento $lancamento){

        $lancamento->createLancamento($request->user_id);
        return response()->json([
            "response"=>'Cadastrado com sucesso'
        ], 200);
    }

    public function getLancamentos(Lancamento $lancamento, Request $request){

        return $lancamento->getLancamentos($request);
    }

    public function updateLancamento(Lancamento $lancamento, LancamentoRequest $request){
        $lancamento->updateLancamento($request->validated());
        return 'sucesso';
    }

    public function getLancamentoID(Lancamento $lancamento, $id, Request $request){
        return $lancamento->getLancamentoID($id, $request);

    }

    public function deleteLancamento(Request $request, Lancamento $lancamento){
        return $lancamento->deleteLancamento($request);
    }

}
