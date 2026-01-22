<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\DespesaController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\PresencaController;
use App\Http\Controllers\FiliacaoController;
use App\Http\Controllers\EmprestimoController;
use App\Http\Controllers\ColaboradorController;
use App\Http\Controllers\ContabilidadeController;

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

Route::get('/healthz', function () {
    return response()->json(['status' => 'ok']);
});


Route::group(['middleware' => ['auth']], function(){
    Route::get('/', [HomeController::class, 'index'])->name('home');
    
    Route::get('/balcao/entidade', [ClienteController::class, 'index'])->name('entidade.index');
    Route::get('/balcao/entidade/create', [ClienteController::class, 'create'])->name('entidade.create');
    Route::post('/balcao/entidade/store', [ClienteController::class, 'store'])->name('entidade.store');
    Route::post('/balcao/entidade/dados', [ClienteController::class, 'getDataClient'])->name('simulador.getDataClient');    
    
    Route::get('/balcao/simulador', [EmprestimoController::class, 'indexSimulator'])->name('simulador.index');
    Route::post('/balcao/simulador/start', [EmprestimoController::class, 'startSimulator'])->name('simulador.start');
    
    Route::get('/emprestimos/contas', [EmprestimoController::class, 'index'])->name('emprestimo.contas');
    Route::get('/emprestimos/prestacao/mora', [EmprestimoController::class, 'mora'])->name('emprestimo.mora');
    Route::get('/emprestimos/prestacao/pagar', [EmprestimoController::class, 'pagar'])->name('emprestimo.pagar');
    Route::get('/emprestimo/remove/{emprestimo}',[EmprestimoController::class, 'destroy']);

    Route::get('/emprestimo/create', [EmprestimoController::class, 'create2'])->name('emprestimo.create2');
    Route::get('/emprestimo/create/{client}', [EmprestimoController::class, 'create'])->name('emprestimo.create');

    Route::get('/caixa/show', [EmprestimoController::class, 'show'])->name('caixa.show');

    Route::post('/emprestimo/store', [EmprestimoController::class, 'store'])->name('emprestimo.store');
    Route::post('/emprestimo/dados', [EmprestimoController::class, 'getDataEmprestimo'])->name('emprestimo.getDataEmprestimo');
    Route::post('/emprestimo/prestacao/pay', [EmprestimoController::class, 'pay'])->name('prestacao.pay');

    Route::get('/livroponto', [PresencaController::class, 'index'])->name('livroponto');
    Route::post('/livroponto/store', [PresencaController::class, 'store'])->name('livroponto.store');

    Route::get('/home/grafico', [HomeController::class, 'grafico'])->name('grafico');

    Route::middleware(['can:isAdmin'])->group(function () {
        Route::get('/caixa/consulta', [EmprestimoController::class, 'consultaCaixa'])->name('caixa.consulta');

        Route::get('/contabilidade', [ContabilidadeController::class, 'index'])->name('contabilidade');

        Route::get('/despesas', [DespesaController::class, 'index'])->name('despesas');
        Route::post('/despesas/store', [DespesaController::class, 'store'])->name('despesas.store');

        Route::get('/filiacao', [FiliacaoController::class, 'index'])->name('filiacao.index');
        Route::post('/filiacao/store', [FiliacaoController::class, 'store'])->name('filiacao.store');

        Route::get('/colaboradores', [ColaboradorController::class, 'index'])->name('colaborador.index');
        Route::post('/colaborador/store', [ColaboradorController::class, 'store'])->name('colaborador.store');
        Route::get('/colaborador/password/formChange', [ColaboradorController::class, 'showChangePassword'])->name('colaborador.changePassword.index');
        Route::post('/colaborador/password/change', [ColaboradorController::class, 'changePassword'])->name('colaborador.password.update');
    });

});

Auth::routes();