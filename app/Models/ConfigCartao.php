<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}
