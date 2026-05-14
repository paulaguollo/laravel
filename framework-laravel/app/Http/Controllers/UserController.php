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

  //ir à base de dados buscar o responsável pela gestão
        $contactInfo = [
            'name'=>'Márcia',
            'email'=> 'Marcia@gmail.com'
        ];

        $contacts = [
            ['id'=>1, 'name'=>'Sara', 'email'=>'Sara@gmail.com'],
            ['id'=>2, 'name'=>'Bruno', 'email'=>'Bruno@gmail.com'],
            ['id'=>3, 'name'=>'Vitor', 'email'=>'Vitor@gmail.com'],
 
        ];

   //debug
        //var_dump($contactInfo['name']); //   ou dd($contactInfo['name']);
   
    return view('users.allUsers', compact('contactInfo', 'contacts')); // Informação corresponde de onde vai buscar a parte visual (views)
}

}
