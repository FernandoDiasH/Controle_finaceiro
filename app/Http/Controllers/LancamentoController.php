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
        if(Auth::check()){
            $data = $request->validated();
            $data['user_id'] = Auth::id();
            $lancamento->createLancamento($data);
            return 'teste';
        }else{
            return 'Você nao esta logado';
        }
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
