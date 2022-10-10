<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Throwable;

class Operacao extends Model
{
    use HasFactory;

    protected $table = 'operacao';

    protected $fillable = [
        'user_id',
        'categoria',
        'tipo',
    ];

    public function createOperacao($request){
        try{
            $this->create($request);
            return 'sucesso';
        }catch(Throwable $e){
            return 'erro no servidor';
        }
    }

    public function getOperacao($request){

        $sql = $this->select('*')
                    ->where('user_id', $request->user_id);

        if($request->categoria){
            $sql->where('categoria', 'like', "%$request->categoria%");
        }
        if($request->tipo){
            $sql->where('tipo', $request->tipo);
        }

        return $sql->orderBy('categoria', $request->ordemCategoria ?? 'desc')->simplePaginate($request->perPagina);

    }

    public function getOperacaoID($id, $request){
        return $this->where('id', $id)
                    ->where('user_id', $request->user_id)
                    ->get();
    }

    public function updateOperacao($request){

        return $this->where('user_id', $request->user_id)
                    ->where('id', $request->id)
                    ->update($request->all());
    }

    public function usuario(){
        return $this->belongsTo(Usuario::class);
    }

    public function lancamentos(){
        return $this->hasMany(Lancamento::class);
    }
}
