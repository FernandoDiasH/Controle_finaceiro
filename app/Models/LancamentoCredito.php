<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LancamentoCredito extends Model
{
    use HasFactory;

    protected $table = "lancamento_credito";

    protected $fillable = [
        'user_id',
        'config_cartao_id',
        'dta_compra',
        'descricao',
        'valor',
        'parcelas',
    ];
}
