<?php

namespace Database\Seeders;

use App\Models\Usuario;
use GuzzleHttp\Promise\Create;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Usuario::create([
            "nome_usuario" => "adm",
            "nome" => "adm",
            "email" => "adm@hotmail.com",
            "senha" => "1234"
        ]);

        Usuario::create([
            "nome_usuario" => "fernando",
            "nome" => "fernando",
            "email" => "fernando@hotmail.com",
            "senha" => "1234"
        ]);
    }
}
