<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UtilController extends Controller
{
    public function welcomeFunction () {
    return view('welcome');
}

// Primeira Função
public function HelloFunction () {
    return "<h1>Olá mundo</h1>";
}

// Primeira view
public function homeFunction() {
    return view('utils.homepage');
}

// Função com variáveis
public function TesteFunction() {
    // Ir à base de dados buscar o login com select * from users where name='Beatriz';
    $name = 'Beatriz';
 
    // Reatribuir valores à variável name
    $name = 'Margarida';
 
    return "<h5>Variáveis $name</h5>";
}

// Função de erro - página não encontrada
public function fallbackFunction() {
    return view('utils.fallback');
}

}
