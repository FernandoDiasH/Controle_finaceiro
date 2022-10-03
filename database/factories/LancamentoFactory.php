<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Lancamento>
 */
class LancamentoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            "usuario_id" => "1",
            "operacao_id" => "2",
            "dta_lancamento"=> '2022-10-15',
            "descricao" => fake()->company(),
            "valor" => fake()->randomFloat(2, 0, 500),
        ];
    }
}
