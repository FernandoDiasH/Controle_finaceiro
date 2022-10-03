<?php

namespace Database\Seeders;

use App\Models\ConfigCartao;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ConfigCartaoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ConfigCartao::create([
            "usuario_id"=>'1',
            "banco_id" => '1',
            "descricao" => 'Cartao de crédito',
            "dia_vencimento"=> '18',
            "dia_fechamento"=>'11',
            'limite_cartao' =>'2200'
        ]);
    }
}
