<?php

use App\Http\Controllers\BancoController;
use App\Http\Controllers\ConfigCartaoController;
use App\Http\Controllers\LancamentoController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\OperacaoController;
use App\Http\Controllers\UserController;
use App\Models\Lancamento;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function (){
    return view('welcome');
})->name('welcome');

Route::prefix('cadastrar')->group(function(){
    Route::name('cadastrar.')->group(function(){
        Route::controller(UserController::class)->group(function (){
            Route::post('/usuario', 'createUsuario')->name('usuario');
        });
        Route::controller(OperacaoController::class)->group(function(){
            Route::post('/operacao', 'createOperacao')->name('operacao');
        });
        Route::controller(LancamentoController::class)->group(function(){
            Route::post('/lancamento', 'createLancamento')->name('lancamento');
        });
        Route::controller(BancoController::class)->group(function (){
            Route::post('/banco', 'store')->name('store.banco');
        });
        Route::controller(ConfigCartaoController::class)->group(function(){
            Route::post('/configCartao', 'store')->name('store.configCartao');
        });
    });
});


Route::name('buscar.')->group(function(){
    Route::controller(LancamentoController::class)->group(function(){
        Route::post('/lancamentos', 'getLancamentos')->name('lancamentos');
        Route::get('/lancamentos', 'getLancamentos')->name('lancamentos.get');
        Route::post('/lancamento/{id}', 'getLancamentoID')->name('lancamento.id');

    });
    Route::controller(OperacaoController::class)->group(function(){
        Route::post('operacao', 'getOperacao')->name('operacao');
        Route::post('operacao/{id}', 'getOperacaoID')->name('operacaoID');
    });
});
Route::name('delete.')->group(function(){
    Route::controller(LancamentoController::class)->group(function(){
        Route::post('delete/lancamento', 'deleteLancamento')->name('lancamento');
    });


});


Route::prefix('update')->group(function(){
    Route::name('update.')->group(function(){
        Route::controller(LancamentoController::class)->group(function(){
            Route::post('lancamento', 'updateLancamento')->name('lancamento');
        });
    Route::post('operacao', [OperacaoController::class, 'updateOperacao'])->name('operacao');
    });
});


Route::post('cadastrar/user', [LoginController::class, 'storeUser'])->name('store.user');
Route::post('login', [LoginController::class, 'login'])->name('login.user');
Route::get('logout', [LoginController::class, 'logout']);
Route::get('teste', [LoginController::class, 'teste']);

Route::get('rotas', [LoginController::class, 'rotas'])->middleware('access');


