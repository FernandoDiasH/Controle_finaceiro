<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RegistroParcela extends Model
{
    use HasFactory;

    protected $fillable = [
        'dta_vencimento',
        'valor_parcela',
        'situacao',
    ];
}
