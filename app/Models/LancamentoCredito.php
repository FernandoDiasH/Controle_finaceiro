<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LancamentoCredito extends Model
{
    use HasFactory;

    protected $table = "lancamento_credito";

    protected $fillable = [
        'dta_compra',
        'descricao',
        'valor',
        'parcelas',

    ];
}
