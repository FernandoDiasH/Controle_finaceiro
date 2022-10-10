<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lancamento extends Model
{
    use HasFactory;

    protected $table = 'lancamento';

    protected $fillable = [
        'user_id',
        'operacao_id',
        'dta_lancamento',
        'descricao',
        'valor',
    ];

    public function createLancamento($request){
        $this->create($request);
    }

    public function getLancamentoID($id, $request){
       return $this->where('id', $id)
                    ->where('user_id', $request->user_id)
                    ->get();
    }

    public function getLancamentos($request){
        $sql = $this->join('operacao', 'operacao_id', 'operacao.id')
                        ->select('*')
                        ->where('lancamento.user_id', $request->user_id);

        if($request->descricao){
            $sql->where('descricao', 'LIKE', "%$request->descricao%");
        }
        if($request->operacao_id){
            $sql->where('operacao_id', $request->operacao_id);
        }
        if($request->valor_inicio){
            $sql->where('valor', '>=', $request->valor_inicio);
        }
        if($request->valor_fim){
            $sql->where('valor', '<=', $request->valor_fim);
        }
        if($request->dta_inicio){
            $sql->where('dta_lancamento', '>=', $request->dta_inicio);
        }
        if($request->dta_fim){
            $sql->where('dta_lancamento', '<=', "$request->dta_fim");
        }

        return $sql->orderBy('dta_lancamento', $request->ordemDta ?? 'asc')->simplePaginate($request->perPagina ?? 15);

    }

    public function updateLancamento($request){
        $sql = $this->where('usuario_id', $request->user_id)
                    ->where('id', $request->id)
                    ->update($request->all());

        return $sql;
    }

    public function deleteLancamento($request){
        $this->where('usuario_id', $request->usuario_id)
            ->where('id', $request->id)
            ->delete();
        return 'ok';
    }



    //relacionamentos
    public function user(){
        return $this->belongsTo(User::class);
    }

    public function operacao(){
        return $this->belongsTo(Operacao::class);
    }
}
