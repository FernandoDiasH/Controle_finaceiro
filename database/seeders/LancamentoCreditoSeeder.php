<?php

namespace Database\Seeders;

use App\Models\LancamentoCredito;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LancamentoCreditoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        LancamentoCredito::factory(1)->create();
    }
}
