<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Throwable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nome_usuario',
        'nome',
        'email',
        'password',
    ];


    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function createUsuario($request){

        try {
            $this->create($request);
            return 'sucesso';
        } catch (Throwable $th) {
            return 'erro no banco';
        }
    }

    public function lancamentos(){
        return $this->hasMany(Lancamento::class);
    }

    public function operacoes(){
        return $this->hasMany(Operacao::class);
    }

    public function bancos(){
        return $this->hasMany(banco::class);
    }

    public function configCartao(){
        return $this->hasMany(ConfigCartao::class);
    }
}
