<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BookController extends Controller
{
    /**
     * Lista todos os livros com o nome do utilizador associado.
     * Faz um JOIN entre a tabela 'books' e 'users' para buscar
     * o nome do utilizador junto com cada tarefa.
     */
    public function allBooksFunction()
    {
        $booksFromDb = DB::table('books')
            // JOIN com a tabela 'users' ligando books.user_id ao users.id
            ->join('users', 'users.id', '=', 'books.user_id')
            ->select('books.*', 'users.name AS username')
            ->get(); 

        // Envia os dados para a view 'allBooks'
        // compact('booksFromDb') transforma a variável num array ['booksFromDb' => $booksFromDb]
        return view('allBooks', compact('booksFromDb'));
    }


     //Mostra os detalhes de um livro.

    public function viewBook($id)
    {
        // Busca na tabela books apenas a linha onde o id corresponde
        // first() retorna só o primeiro resultado (um objeto), ao invés de uma coleção
        $books = DB::table('books')->where('id', $id)->first();

        return view('viewBook', compact('books'));
    }

    //Deletar livros de um mesmo id.
    public function deleteBook($id)
    {
        // Primeiro apaga todas as tarefas que pertencem ao utilizador com este $id
        DB::table('books')->where('user_id', $id)->delete();

        // Depois apaga o próprio utilizador
        DB::table('users')->where('id', $id)->delete();

        // Redireciona de volta para a página anterior
        return back();
    }

    //Formulário para adicionar uma nova tarefa
  
    public function addBook()
    {
        // Busca todos os utilizadores (só nome e id são necessários para o dropdown)
        $users = DB::table('users')
            ->select('users.name', 'users.id')
            ->get();

        // Envia os utilizadores para a view 'addBook'
        return view('addBook', compact('users'));
    }


    /**
     * Recebe os dados do formulário e guarda a nova tarefa na base de dados.
     * O objeto $request contém tudo o que o utilizador preencheu no formulário.
     */
    public function storeBook(Request $request)
    {
        //dd($request->all());
        // Valida os dados antes de guardar — se falhar, volta ao formulário com erros
        $request->validate([
            'name'        => 'required|string|max:50',        // Obrigatório, texto, máx 50 caracteres
            'user_id'     => 'required|exists:users,id' ,      // Obrigatório e tem de existir na tabela users
            'estimated_price' => 'required|double',
            'paid_price' => 'required|double',   
            'user_id'     => 'required|exists:users,id'       // Obrigatório e tem de existir na tabela users
        ]);

        // Insere o novo registo na tabela books
        DB::table('books')->insert([
            'name'        => $request->name,
            'estimated_price' => $request->estimated_price,
            'user_id'     => $request->user_id
        ]);

        // Redireciona para a rota 'all.books' e envia uma mensagem flash de sucesso
        // A mensagem flash só existe durante o próximo request (ideal para mostrar alertas)
        return redirect()->route('all.books')->with('message', 'Livro atualizado com sucesso!');
    }
}
