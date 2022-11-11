<?php

use App\Http\Controllers\LancamentoController;
use App\Http\Controllers\LancamentoCreditoController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\OperacaoController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ConfigCartaoController;
use App\Http\Controllers\CreditoController;
use App\Http\Controllers\TesteController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware(['auth:sanctum', 'access'])->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('auth:sanctum')->group(function (){
    Route::prefix('cadastrar')->group(function (){
        Route::post('/operacao', [OperacaoController::class, 'store'])->name('operacao');
        Route::post('/lancamento', [LancamentoController::class, 'createLancamento'])->name('lancamento');
        Route::post('/banco', [BancoController::class, 'store'])->name('banco');
        Route::post('/configCartao', [ConfigCartaoController::class, 'store'])->name('config.cartao');
        Route::post('/lancamentoCredito', [LancamentoCreditoController::class, 'store'])->name('lancaentoCredito');
    });
    Route::prefix('buscar')->group(function (){
        Route::controller(LancamentoController::class)->group(function(){
            Route::post('lancamentos', 'getLancamentos')->name('lancamentos');
            Route::post('lancamento/{id}', 'getLancamentoID')->name('lancamento.id');
        });
        Route::controller(OperacaoController::class)->group(function(){
            Route::post('operacao', 'getOperacao')->name('operacao');
            Route::post('operacao/{id}', 'getOperacaoID')->name('operacaoID');
        });
        Route::controller(LancamentoCreditoController::class)->group(function(){
            Route::get('lancamento_credito', 'getLancamentoCredito')->name('lancamento_credito');
        });
        Route::controller(ConfigCartaoController::class)->group(function(){
            Route::get('config-cartao', 'getConfigCartao')->name('config_cartao');
        });
        Route::controller(CreditoController::class)->group(function(){
            Route::post('parcelas', 'getParcelas')->name('parcelas');
        });


    });
    Route::prefix('delete')->group(function(){
        Route::controller(LancamentoController::class)->group(function(){
            Route::post('lancamento', 'deleteLancamento')->name('lancamento');
        });
    });
    Route::prefix('update')->group(function(){
        Route::post('lancamento', [LancamentoController::class, 'updateLancamento'])->name("update.lancamento");
        Route::post('operacao', [OperacaoController::class, 'updateOperacao'])->name('operacao');
    });

    Route::post('logout', [LoginController::class, 'logout'])->name('logout');

});


Route::post('cadastrar/user', [UserController::class, 'store'])->name('store.user');
Route::post('login', [LoginController::class, 'login'])->name('login.user');

Route::get('teste/', [TesteController::class, 'teste']);
Route::post('create/user', [TesteController::class, 'createUser']);
Route::get('delete/user/{id}', [TesteController::class, 'deleteUser']);

Route::get('buscar/user/{id}', [TesteController::class, 'getUser']);

Route::controller(TesteController::class)->group(function(){
    Route::get('buscar/lancamentos/{id}', 'listLancamentos');
});

