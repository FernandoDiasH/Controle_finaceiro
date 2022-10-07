<?php

namespace Database\Seeders;

use App\Models\Lancamento;
use Database\Factories\LancamentoFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LancamentoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       Lancamento::create([
            "user_id" => "1",
            "operacao_id" => "1",
            "dta_lancamento"=> '2022-10-14',
            "descricao" => fake()->company(),
            "valor" => 1200,
       ]);

        Lancamento::factory(5)->create();
    }
}
