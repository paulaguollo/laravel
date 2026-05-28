<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
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

    public function deleteTask($id){


       DB::table('tasks_')->where('id', $id)->delete();

        return back();

    }

    public function viewTask($id){

        $users = DB::table('users')->select('users.name', 'users.id')->get();

        $task = DB::table('tasks_')
        ->where('tasks_.id', $id)
          ->join('users', 'tasks_.user_id', 'users.id')
        ->select('tasks_.nome', 'tasks_.description', 'tasks_.due_at', 'tasks_.status', 'tasks_.id', 'users.name as username', 'tasks_.user_id')
        ->first();

        return view('viewTask', compact('task', 'users'));

    }

public function updateTask(Request $request) {
 
$request->validate([
    'name' => 'String|required|max:50',
    'user_id' => 'required|exists:users,id'
]);
 
db::table('tasks')
->where('id', $request->id) // aqui estamos a dizer que queremos atualizar a task com o id que é igual ao id que recebemos por parametro, e o where é para dizer que queremos ir buscar a task com o id que é igual ao id que recebemos por parametro
->update([
    'name' => $request->name,
    'user_id' => $request->user_id ,
     'description' => $request->description ,
      'due_at' => $request->due_at ,
      'status' => $request->status ,
    
]);
 
    return redirect()->route('tasks.show')->with('message', 'Task atualizada com sucesso!');     // aqui estamos a dizer que queremos carregar a view tasks.view, e o compact é para dizer que queremos passar a variável task para a view, ou seja, queremos passar os dados da task que obtivemos da base de dados para a view
}
}