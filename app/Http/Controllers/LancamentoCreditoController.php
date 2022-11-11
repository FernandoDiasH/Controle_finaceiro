<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use App\Models\LancamentoCredito;
use App\Models\RegistroParcela;
use App\Models\ConfigCartao;
use DateTime;
class LancamentoCreditoController extends Controller
{
    public function store(Request $request){
        $lancamento = LancamentoCredito::create($request->all());
        return $this->registrarParcelas($lancamento);
    }

    public function registrarParcelas($lancamento ){

        $config = ConfigCartao::where('user_id', $lancamento->user_id)->where('id', $lancamento->config_cartao_id)->get();

        $dataCompra = new DateTime($lancamento->dta_compra);

        $vencimento = array();

        for($i = 0; $i < $lancamento->parcelas; $i++){
            if($dataCompra->format('d') < $config[0]->dia_fechamento){
                array_push($vencimento, $dataCompra->format("Y-m"). '-' .  $config[0]->dia_vencimento);
                $dataCompra->modify("+1 month");
            }else{
                $dataCompra->modify("+1 month");
                array_push($vencimento, $dataCompra->format("Y-m"). '-' .  $config[0]->dia_vencimento);
            }
        }

        $valorParcela = $lancamento->valor / $lancamento->parcelas;

        $parcela = [
            'user_id'=> $lancamento->user_id,
            'lancamento_credito_id'=> $lancamento->id,
            'dta_vencimento'=>'',
            'valor_parcela'=> $valorParcela,
            'situacao'=> 'A'
        ];

        $parcelas = array();

        for($i = 0; $i < $lancamento->parcelas; $i++){
            $parcela['dta_vencimento'] = $vencimento[$i];
            array_push($parcelas, $parcela);
        }
        return RegistroParcela::insert($parcelas);
    }


    public function getLancamentoCredito(){
        return LancamentoCredito::all();
    }
}
