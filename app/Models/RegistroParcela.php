<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RegistroParcela extends Model
{
    use HasFactory;

    protected $table = 'registro_parcelas';

    protected $fillable = [
        'user_id',
        'lancamento_credito_id',
        'dta_vencimento',
        'valor_parcela',
        'situacao',
    ];
}
