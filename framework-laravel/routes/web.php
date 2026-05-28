<?php

use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UtilController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\DashboardController;
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

/**********************************INICIO DAS ROTAS DO USER********************************* */
 
// Rota para adicionar utilizadores
// Nome da rota -> quando quiser chamar essa rota, chamar por esse nome
Route::get('/add_users', [UserController::class, 'userFunction']  )->name('users.add'); 
 
// Rota para adicionar utilizadores
Route::get('/all_users', [UserController::class, 'allUsersFunction']  )->name('users.all'); 

//rota que recebe os dados do formulário e os insere na base de dados
Route::post('/store_user', [UserController::class, 'storeUser'])->name('users.store');

//rota com parametro que delete user
Route::get('/delete_user/{id}', [UserController::class, 'deleteUser'])->name('users.delete');

//rota com parametros que carrega a ficha de cada user
Route::get('/view_user/{id}', [UserController::class, 'viewUser'])->name('users.view');

//rota que recebe os dados do user
Route::put('/update-user', [UserController::class, 'updateUser'])->name('users.update');

/**********************************FINAL DAS ROTAS DO USER********************************* */


/**********************************INICIO DAS ROTAS DAS TASKS******************************* */
//URL   --- FUNCAO ----- NOME DA ROTA
Route::get('/delete_task/{id}', [TaskController::class, 'deleteTask'])->name('tasks.delete');

Route::get('/view_task/{id}', [TaskController::class, 'viewTask'])->name('tasks.view');

// Rota para adicionar tarefas
Route::get('/all_tasks', [TaskController::class, 'alltasksFunction']  )->name('all.tasks')->middleware('auth'); 

// Rota que carrega visualmente o formulario
 // Nome da rota -> quando quiser chamar essa rota, chamar por esse nome
Route::get('/add_task', [TaskController::class, 'addTask'])->name('tasks.add');

Route::post('/store_task', [TaskController::class, 'storeTask'])->name('tasks.store');

//rota que recebe os dados das tasks
Route::put('/update-task', [TaskController::class, 'updateTask'])->name('tasks.update');



/**********************************FINAL DAS ROTAS DAS TASKS******************************* */


/**********************************INICIO DAS ROTAS DOS BOOKS******************************* */

//URL   --- FUNCAO ----- NOME DA ROTA

// Todos os livros
Route::get('/all_books', [BookController::class, 'allBooks']  )->name('books.all'); 

// Apagar livro
Route::get('/delete_book/{id}', [BookController::class, 'deleteBook'])->name('books.delete');

// View blade dos livros
Route::get('/view_book/{id}', [BookController::class, 'viewBook'])->name('books.view');

 // Adicionar livro
Route::get('/add_book', [BookController::class, 'addBook'])->name('books.add');

//Passa a informação para a base de dados
Route::post('/store_book', [BookController::class, 'storeBook'])->name('books.store');

/**********************************FINAL DAS ROTAS DOS BOOKS******************************* */


// View blade dos livros
Route::get('/view_book/{id}', [DashboardController::class, 'viewDashboard'])->name('dashboard.view');

// fallback
Route::get('/utils.fallback', [UtilController::class, 'fallbackFunction'] )->name('utils.fallback');

