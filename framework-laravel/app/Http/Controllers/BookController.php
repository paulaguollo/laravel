<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BookController extends Controller
{
    // Lista todos os livros
    public function allBooks()
    {
        $booksFromDb = DB::table('books')
            ->join('users', 'users.id', '=', 'books.user_id')
            ->select('books.*', 'users.name AS username')
            ->get();

        return view('books.allBooks', compact('booksFromDb'));
    }

    // Mostra detalhes de um livro
    public function viewBook($id)
    {
        $books = DB::table('books')->where('id', $id)->first();
        return view('books.viewBooks', compact('books'));
    }

    // Apaga um livro pelo id
    public function deleteBook($id)
    {
        DB::table('books')->where('id', $id)->delete();
        return redirect()->route('books.all');
    }

    // Formulário para adicionar livro
    public function addBook()
    {
        $users = DB::table('users')->select('name', 'id')->get();
        return view('books.addBooks', compact('users'));
    }

    // Guarda o novo livro
    public function storeBook(Request $request)
    {
        $request->validate([
            'name'            => 'required|string|max:50',
            'estimated_price' => 'required|numeric',
            'paid_price'      => 'nullable|numeric',
            'user_id'         => 'required|exists:users,id',
        ]);

        DB::table('books')->insert([
            'name'            => $request->name,
            'estimated_price' => $request->estimated_price,
            'paid_price'      => $request->paid_price,
            'user_id'         => $request->user_id,
        ]);

        return redirect()->route('books.all')->with('message', 'Livro adicionado com sucesso!');
    }
}
