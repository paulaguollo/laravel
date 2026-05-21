<?php

use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UtilController;
use Illuminate\Support\Facades\Route;
 
Route::get('/', [UtilController::class, 'welcomeFunction'])->name('welcome');
 
// Primeira rota
Route::get('/hello', [UtilController::class, 'helloFunction'] );
 
// Primeira view
Route::get('/home', [UtilController::class, 'homeFunction'] )->name('home');
 
// Rota com variáveis
Route::get('/testeVariaveis', [UtilController::class, 'testeFunction'] )->name('var.teste');
 
// Rota com parâmetros - {parametro que irá variar}
Route::get('/parametros/{name}', function ($name) {
    return "<h1>Olá $name</h1>";
});
 
// Rota para adicionar utilizadores
Route::get('/add_users', [UserController::class, 'userFunction']  )->name('users.add'); // Nome da rota -> quando quiser chamar essa rota, chamar por esse nome
 

// Rota para adicionar utilizadores
Route::get('/all_users', [UserController::class, 'allUsersFunction']  )->name('all.users'); 

// Rota para adicionar utilizadores
Route::get('/all_tasks', [TaskController::class, 'alltasksFunction']  )->name('all.tasks'); 

//rota que recebe os dados do formulário e os insere na base de dados
Route::post('/store_user', [UserController::class, 'storeUser'])->name('users.store');


//rota com parametros que carrega a ficha de cada user
Route::get('/view_user/{id}', [UserController::class, 'viewUser'])->name('users.view');

Route::get('/delete_user/{id}', [UserController::class, 'deleteUser'])->name('users.delete');

Route::get('/delete_task/{id}', [TaskController::class, 'deleteTask'])->name('tasks.delete');

Route::get('/view_task/{id}', [TaskController::class, 'viewTask'])->name('tasks.view');

// fallback
Route::get('/utils.fallback', [UtilController::class, 'fallbackFunction'] )->name('utils.fallback');

