<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\LancamentoCredito>
 */
class LancamentoCreditoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            "user_id" => "1",
            "config_cartao_id" => "1",
            "dta_compra" => "2022-10-16",
            "descricao" => fake()->company(),
            "valor"=> '1000',
            "parcelas" => '2',
        ];
    }
}
