<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Throwable;

class Banco extends Model
{
    use HasFactory;

    protected $table = 'banco';

    protected $fillable = [
        'usuario_id',
        'nome_banco',
    ];

    public function store($request){
        try{
            return $this->create($request);

        }catch(Throwable){
            return 'error';
        }
    }


    public function usuario(){
        return $this->belongsTo(Usuario::class);
    }

    public function cartao(){
        return $this->hasMany(ConfigCartao::class);
    }
}
