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
            "user_id" => "1",
            "categoria" => "Remuneração",
            "tipo" => "entrada",

        ]);
        Operacao::create([
            "user_id" => "1",
            "categoria" => "Conta fixa",
            "tipo" => "saida",

        ]);
    }
}
