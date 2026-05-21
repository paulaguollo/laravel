<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TaskController extends Controller
{
    /**
     * Lista todas as tarefas com o nome do utilizador associado.
     * Faz um JOIN entre a tabela 'tasks_' e 'users' para buscar
     * o nome do utilizador junto com cada tarefa.
     */
    public function alltasksFunction()
    {
        $tasksFromDb = DB::table('tasks_')
            // JOIN com a tabela 'users' ligando tasks_.user_id ao users.id
            // Assim conseguimos saber QUAL utilizador pertence cada tarefa
            ->join('users', 'users.id', '=', 'tasks_.user_id')
            // Seleciona todos os campos de tasks_ + o nome do utilizador (apelidado de 'username')
            ->select('tasks_.*', 'users.name AS username')
            ->get(); // Executa a query e retorna todos os resultados

        // Envia os dados para a view 'allTasks'
        // compact('tasksFromDb') transforma a variável num array ['tasksFromDb' => $tasksFromDb]
        return view('allTasks', compact('tasksFromDb'));
    }


    /**
     * Mostra os detalhes de UMA tarefa específica.
     * Recebe o $id da tarefa pela URL (ex: /task/5)
     */
    public function viewTask($id)
    {
        // Busca na tabela tasks_ apenas a linha onde o id corresponde
        // first() retorna só o primeiro resultado (um objeto), ao invés de uma coleção
        $tasks = DB::table('tasks_')->where('id', $id)->first();

        return view('viewTask', compact('tasks'));
    }


    /**
     * Elimina uma tarefa E o utilizador associado.
     * ATENÇÃO: esta função apaga tanto as tarefas do utilizador
     * como o próprio utilizador da base de dados!
     */
    public function deleteTask($id)
    {
        // Primeiro apaga todas as tarefas que pertencem ao utilizador com este $id
        DB::table('tasks_')->where('user_id', $id)->delete();

        // Depois apaga o próprio utilizador
        DB::table('users')->where('id', $id)->delete();

        // Redireciona de volta para a página anterior
        return back();
    }


    /**
     * Mostra o formulário para adicionar uma nova tarefa.
     * Carrega a lista de utilizadores para preencher um <select> no formulário.
     */
    public function addTask()
    {
        // Busca todos os utilizadores (só nome e id são necessários para o dropdown)
        $users = DB::table('users')
            ->select('users.name', 'users.id')
            ->get();

        // Envia os utilizadores para a view 'addTask'
        return view('addTask', compact('users'));
    }


    /**
     * (Função antiga/não utilizada aparentemente)
     * Retorna uma view diferente para adicionar tarefas.
     * Provavelmente foi substituída pela addTask() acima.
     */
    public function taskFunction()
    {
        return view('tasks.add');
    }


    /**
     * Recebe os dados do formulário e guarda a nova tarefa na base de dados.
     * O objeto $request contém tudo o que o utilizador preencheu no formulário.
     */
    public function storeTask(Request $request)
    {
        //dd($request->all());
        // Valida os dados antes de guardar — se falhar, volta ao formulário com erros
        $request->validate([
            'nome'        => 'required|string|max:50',        // Obrigatório, texto, máx 50 caracteres
            'description' => 'required|string|min:5|max:50',  // Obrigatório, mínimo 5 e máximo 50 caracteres
            'user_id'     => 'required|exists:users,id'       // Obrigatório e tem de existir na tabela users
        ]);

        // Insere o novo registo na tabela tasks_
        DB::table('tasks_')->insert([
            'nome'        => $request->nome,
            'description' => $request->description,
            'user_id'     => $request->user_id
        ]);

        // Redireciona para a rota 'all.tasks' e envia uma mensagem flash de sucesso
        // A mensagem flash só existe durante o próximo request (ideal para mostrar alertas)
        return redirect()->route('all.tasks')->with('message', 'Tarefa actualizada com sucesso!');
    }
}