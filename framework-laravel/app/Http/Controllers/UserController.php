<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    // Função para adicionar utilizadores
    public function userFunction() { // Caminho do browser (URL)
    return view('users.addUtilizadores'); // Informação corresponde de onde vai buscar a parte visual (views)
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

        $search = request()->query('search') ? request()->query('search') : null;

        $usersFromDb= DB::table('users');

        if($search){
            $usersFromDb->where('name', "LIKE", "%{$search}%");
            $usersFromDb->orwhere('email', "LIKE", "%{$search}%");
        }

        $usersFromDb=  $usersFromDb->get();

        //dd($usersFromDb); 

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
    
    DB::table('books')->where('user_id', $id)->delete();

    DB::table('users')->where('id', $id)->delete();


 
    return back();
 
    }

    public function storeUser(Request $request) {
       // dd($request->all());

            $request->validate([
            'name'=>'required|string|max:50',
            'email'=>'required|email|unique:users',
            'password'=>'min:8|required'
        ]);

      User::insert([
            'name' => $request->name,
            'email' => $request->email,
            'password'=> Hash::make($request->password)
        ]);


                return redirect()->route('users.all')->with('message', 'user adicionado com sucesso!');

    }

public function updateUser(Request $request) {
   $request->validate([
            'name'=>'required|string|max:50',
        ]);
 
  db::table('users')
        ->where('id',$request->id)
        ->update([
            'name' =>$request->name,
             'adress' =>$request->adress,
        ]);

        return redirect()->route('users.all')->with('message', 'user actualizado com sucesso!');
} 
}