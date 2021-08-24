<?php

use Illuminate\Support\Facades\Redirect;
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

Route::get('/', function () {
    return Redirect('/login');
});

Auth::routes();

Route::post('/login', [
    'uses'          => 'App\Http\Controllers\Auth\LoginController@login',
    'middleware'    => 'checkstatus',
]);



Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/propostas',[App\Http\Controllers\PropostaController::class,'index'])->name('propostas');
Route::get('/nova-proposta',[App\Http\Controllers\PropostaController::class,'create'])->name('nova-proposta');
Route::post('/salvar-proposta',[App\Http\Controllers\PropostaController::class,'store'])->name('salvar-proposta');
Route::get('/editar-proposta/{IdProposta}',[App\Http\Controllers\PropostaController::class,'edit'])->name('editar-proposta');
Route::post('/atualizar-proposta/{IdProposta}',[App\Http\Controllers\PropostaController::class,'update'])->name('atualizar-proposta');




Route::get('/parceiros',[App\Http\Controllers\ParceiroController::class,'index'])->name('parceiros');
Route::get('/novo-parceiro',[App\Http\Controllers\ParceiroController::class,'create'])->name('novo-parceiro');
Route::post('/salvar-parceiro',[App\Http\Controllers\ParceiroController::class,'store'])->name('salvar-parceiro');
Route::get('/editar-parceiro/{IdParceiro}',[App\Http\Controllers\ParceiroController::class,'edit'])->name('editar-parceiro');
Route::post('/atualizar-parceiro/{IdParceiro}',[App\Http\Controllers\ParceiroController::class,'update'])->name('atualizar-parceiro');


Route::get('/usuarios/{idParceiro?}', [App\Http\Controllers\UserController::class,'index'])->name('usuarios');

Route::get('/novo-usuario',[App\Http\Controllers\UserController::class,'create'])->name('novo-usuario');

Route::post('/novo-usuario',[App\Http\Controllers\UserController::class,'store'])->name('novo-usuario');

Route::get('/editar-usuario/{IdUsuario}',[App\Http\Controllers\UserController::class,'edit'])->name('editar-usuario');

Route::post('/atualizar-usuario/{IdUsuario}',[App\Http\Controllers\UserController::class,'update'])->name('atualizar-usuario');

Route::get('/vincular-usuario/{IdUsuario}',[App\Http\Controllers\UserController::class,'vincularGerente'])->name('vincular-usuario');

Route::post('/salvar-vinculo/{IdUsuario}', [App\Http\Controllers\UserController::class,'salvarVinculo'])->name('salvar-vinculo');

Route::get('/acompanhamentos/{IdProposta}', [App\Http\Controllers\AcompanhamentoController::class,'index'])->name('acompanhamentos');
Route::get('/acompanhamento/{IdProposta}', [App\Http\Controllers\AcompanhamentoController::class,'create'])->name('novo-acompanhamento');
Route::post('/acompanhamento/{IdProposta}', [App\Http\Controllers\AcompanhamentoController::class,'store'])->name('novo-acompanhamento');
Route::get('/acompanhamento-cliente/{IdProposta}', [App\Http\Controllers\AcompanhamentoController::class,'indexCliente'])->name('acompanhamento-cliente');