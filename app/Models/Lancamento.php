<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lancamento extends Model
{
    use HasFactory;

    protected $table = 'lancamento';

    protected $fillable = [
        'usuario_id',
        'operacao_id',
        'dta_lancamento',
        'descricao',
        'valor',
    ];
}
