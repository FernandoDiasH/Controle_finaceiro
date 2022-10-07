<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Throwable;

class ConfigCartao extends Model
{
    use HasFactory;

    protected $table = 'config_cartao';

    protected $fillable = [
        'usuario_id',
        'banco_id',
        'descricao',
        'dia_vencimento',
        'dia_fechamento',
        'limite_cartao',
    ];

    public function store($request){
        try{
            return $this->create($request);

        }catch(Throwable){
            return 'error';
        }
    }

    public function usuario(){
        return $this->belongsTo(usuario::class);
    }

    public function banco(){
        return $this->belongsTo(Banco::class);
    }
}
