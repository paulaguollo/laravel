<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    // Função para adicionar utilizadores
    public function userFunction() { // Caminho do browser (URL)
    return view('users.add'); // Informação corresponde de onde vai buscar a parte visual (views)
}

    // Função para mostrar todosos utilizadores
    public function allUsersFunction() { // Caminho do browser (URL)
    return view('users.allUsers'); // Informação corresponde de onde vai buscar a parte visual (views)
}


}
