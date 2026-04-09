<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

use App\Http\Controllers\UsuarioController; //importa a classe usuario controoller que está em uma pasta
Route::get('/usuario',[UsuarioController::class,'index']); //get- busca dados, url- usuario, usuario controller- quando o usuário clica no site, vai até a index
Route::post('/usuario/salvar',[UsuarioController::class,'salvar']); //post- envia dados. usuário salvar- quando envia o formulário vai até o salvar do usuario controller