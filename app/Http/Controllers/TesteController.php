<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

Use App\Class\User;
use App\Http\Requests\UserRequest;
use App\Class\Lancamentos;

class TesteController extends Controller
{
    protected $user;
    protected $lacamento;

    public function __construct(){
        $this->user = new User();
        $this->lancamento = new Lancamentos();
    }

    public function createUser(UserRequest $request){

        $this->user->setDados($request->validated());
        $this->user->createUser();

        dd($this->user);
    }
    public function getUser($id){

        $user = $this->user->getUser($id);
        return $user;
    }

    public function deleteUser($id){
        $this->user->deleteUser($id);
        return 'deletado';
    }

    public function listLancamentos($id){
        $lancamentos = $this->lacamento;
        dd($lancamentos);
    }
}
