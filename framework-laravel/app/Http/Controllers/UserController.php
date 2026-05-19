<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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

        //oficialmente dados da base de dados

        //$usersFromDb = DB::table('users')
        //->whereNotNull('adress')
        // ->where('password', '12345') aparece  quem tem senha 12345
           // ->whereNotNull('adress', null) aparece o que nao tem adress
              // ->whereNull('adress') aparece o que nao tem adress
        //->get();

        //query usando o model
        $usersFromDb = User::get();


        //dd($usersFromDb); para ver os dados

   //debug
        //var_dump($contactInfo['name']); //   ou dd($contactInfo['name']);
   
    return view('users.allUsers', compact('contactInfo', 'contacts', 'usersFromDb')); // Informação corresponde de onde vai buscar a parte visual (views)
}

public function viewUser($id){

 $user = DB::table('users')->where('id', $id)->first();
 
    return view('users.view', compact('user'));
 
    }

    public function deleteUser($id){

    DB::table('tasks_')->where('user_id', $id)->delete();
    DB::table('users')->where('id', $id)->delete();

 
    return back();
 
    }

}
