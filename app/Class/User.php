<?php

namespace App\Class;

use App\Models\User as userModel;
use Illuminate\Support\Facades\Hash;

class User {
    private $id;
    private $nomeUsuario;
    private $nome;
    private $email;
    private $password;

    public function getID(){
        return $this->id;
    }

    public function setID(Int $id){
        $this->id  = $id;
    }

    public function getNomeUsuario(){
        return $this->nomeUsuario;
    }

    public function setNomeUsuario(String $nomeUsuario){
        $this->nomeUsuario  = $nomeUsuario;
    }

    public function getNome(){
        return $this-> nome;
    }

    public function setNome(String $nome){
        $this->nome  = $nome;
    }

    public function getEmail(){
        return $this-> email;
    }

    public function setEmail(String $email){
        $this->email  = $email;
    }

    public function getPassword(){
        return $this-> password;
    }

    public function setPassword(String $password){
        $this->password  = Hash::make($password);
    }

    public function setDados(Array $dados){
        $this->setNomeUsuario($dados['nome_usuario']);
        $this->setNome($dados['nome']);
        $this->setEmail($dados['email']);
        $this->setPassword($dados['password']);
    }

    public function setUser($dados){
        $this->setID($dados->id);
        $this->setNomeUsuario($dados->nome_usuario);
        $this->setNome($dados->nome);
        $this->setEmail($dados->email);
        $this->password = $dados->password;
    }

    public function getUser($id){
        $user = userModel::where('id', $id)->get();
        $this->setUser($user->first());
        return $user->first();
    }

    public function createUser(){
        userModel::create([
            'nome_usuario' => $this->getNomeUsuario(),
            'nome'=> $this->getNome(),
            'email'=> $this->getEmail(),
            'password'=>$this->getPassword()
        ]);
    }

    public function deleteUser($id){
        $this->getUser($id);
        userModel::where('id', $this->getID())->delete();
    }
}



