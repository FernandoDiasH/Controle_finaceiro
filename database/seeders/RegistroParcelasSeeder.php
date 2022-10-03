<?php

namespace Database\Seeders;

use App\Models\RegistroParcela;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RegistroParcelasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 0; $i < 2; $i++){
            RegistroParcela::create([
                "usuario_id"=> '1',
                "lancamento_credito_id" => "1",
                "dta_vencimento" => '2022-'. 10 + $i."-18",
                "valor_parcela" => '500',
                "situacao" => 'A',
            ]);
        }
    }
}
