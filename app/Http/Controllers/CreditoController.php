<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RegistroParcela;
use App\Models\LancamentoCredito;


class CreditoController extends Controller
{
    public function getParcelas( Request $request){
        return RegistroParcela::where('user_id', $request->user_id)
                                ->where('lancamento_credito_id', $request->lancamento_credito_id)
                                ->get();
    }
}
