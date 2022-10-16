<?php

namespace Database\Seeders;

use App\Models\User;
use GuzzleHttp\Promise\Create;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            "nome_usuario" => "adm",
            "nome" => "adm",
            "email" => "adm@hotmail.com",
            "password" => "1234"
        ]);

        User::create([
            "nome_usuario" => "fernando",
            "nome" => "fernando",
            "email" => "fernando@hotmail.com",
            "password" => "1234"
        ]);
    }
}
