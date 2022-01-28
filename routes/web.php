<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\EmprestimoController;
use App\Http\Controllers\PresencaController;
use App\Http\Controllers\FiliacaoController;
use App\Http\Controllers\ColaboradorController;

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

Route::get('/', function () {
    return view('auth.login');
});
Route::group(['middleware' => ['auth']], function(){
    Route::get('/entidade', [ClienteController::class, 'index'])->name('entidade.index');
    Route::get('/entidade/create', [ClienteController::class, 'create'])->name('entidade.create');
    Route::post('/entidade/store', [ClienteController::class, 'store'])->name('entidade.store');
    Route::post('/entidade/dados', [ClienteController::class, 'getDataClient'])->name('simulador.getDataClient');
    
    
    Route::get('/simulador', [EmprestimoController::class, 'indexSimulator'])->name('simulador.index');
    Route::post('/simulador/start', [EmprestimoController::class, 'startSimulator'])->name('simulador.start');
    
    
    Route::get('/emprestimos', [EmprestimoController::class, 'index'])->name('emprestimo.index');
    Route::get('/emprestimo/create', [EmprestimoController::class, 'create2'])->name('emprestimo.create2');
    Route::get('/emprestimo/create/{client}', [EmprestimoController::class, 'create'])->name('emprestimo.create');
    Route::get('/emprestimo/show', [EmprestimoController::class, 'show2'])->name('emprestimo.show2');
    Route::get('/emprestimo/show/{emprestimo}', [EmprestimoController::class, 'show'])->name('emprestimo.show');
    Route::post('/emprestimo/store', [EmprestimoController::class, 'store'])->name('emprestimo.store');
    Route::post('/emprestimo/dados', [EmprestimoController::class, 'getDataEmprestimo'])->name('emprestimo.getDataEmprestimo');
    Route::post('/emprestimo/prestacao/pay', [EmprestimoController::class, 'pay'])->name('prestacao.pay');

    Route::get('/livroponto', [PresencaController::class, 'index'])->name('livroponto');
    Route::post('/livroponto/store', [PresencaController::class, 'store'])->name('livroponto.store');
    Route::get('/filiacao', [FiliacaoController::class, 'index'])->name('filiacao.index');
    Route::post('/filiacao/store', [FiliacaoController::class, 'store'])->name('filiacao.store');

    Route::get('/colaboradores', [ColaboradorController::class, 'index'])->name('colaborador.index');
    Route::post('/colaborador/store', [ColaboradorController::class, 'store'])->name('colaborador.store');
    
});
Route::get('/home', [HomeController::class, 'index'])->name('home');


//registarEntidade

Auth::routes();