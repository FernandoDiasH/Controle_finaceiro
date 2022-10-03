<?php

namespace Database\Seeders;

use App\Models\Operacao;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OperacaoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Operacao::create([
            "usuario_id" => "1",
            "descricao" => "Remuneração",
            "tipo" => "entrada",

        ]);
        Operacao::create([
            "usuario_id" => "1",
            "descricao" => "Conta fixa",
            "tipo" => "saida",

        ]);
    }
}
