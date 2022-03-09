<?php

use App\Mail\MensagemTesteMail;
use Illuminate\Support\Facades\Auth;
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
    return view('bem-vindo');
});

Auth::routes(['verify' => true]);

/*Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');*/

Route::get('/tarefa/exportacao/{extensao}', [App\Http\Controllers\TarefaController::class, 'exportacao'])->name('tarefa.exportacao');
Route::get('/tarefa/exportar', [App\Http\Controllers\TarefaController::class, 'exportar'])->name('tarefa.exportar');

Route::resource('/tarefa', 'App\Http\Controllers\TarefaController');

Route::get('/mensagem-teste', function () {

    return new MensagemTesteMail();

    //Mail::to('andre.camargo@msn.com')->send(new MensagemTesteMail());
    //return 'E-mail enviao com sucesso!';
});