<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TaskController extends Controller
{
    // Função para adicionar utilizadores
    public function taskFunction() { // Caminho do browser (URL)
    return view('tasks.add'); // Informação corresponde de onde vai buscar a parte visual (views)
}

    // Função para mostrar todosos utilizadores
    public function alltasksFunction() { // Caminho do browser (URL)

         $tasksFromDb = DB::table('tasks_')
         ->join('users', 'users.id', '=', 'tasks_.user_id' )
         ->select('tasks_.*', 'users.name AS username')
         ->get();

   
    return view('allTasks', compact('tasksFromDb')); // Informação corresponde de onde vai buscar a parte visual (views)
}

}
