<?php

namespace App\Class;

use App\Models\User;

class Parcelas {
    private $id;
    private $nomeUsuario;
    private $nome;
    private $email;
    private $password;
    private $dados = [];


    public function __construct($id){
        $this->setDados(User::where('id', $id)->get());
        // $this->id = $user->id;
        // $this->nomeUsuario = $user->nome_usuario;
        // $this->nome = $user->nome;
        // $this->email = $user->email;
        // $this->password = $user->password;
    }

    public function setDados($dados){
        $this->dados = $dados;
    }

}

// class Parcelas extends User{
//     private $lancamento_credito_id;
//     private $dta_vencimento;
//     private $valor_parcela;
//     private $situacao;


// }
// $parcelas = new Parcelas(1);


