<?php

namespace App\Class;

use App\Class\User as ClassUser;
use App\Models\Lancamento;

class Lancamentos extends ClassUser{

    private $userID;
    private $operacaoID;
    private $dtaLancamento;
    private $valor;
    private $user;

    public function __construct()
    {
    }

    public function list ($id){
        return Lancamento::get();
    }

    public function createLancamento(){
        Lancamento::create([

        ]);
    }





}
