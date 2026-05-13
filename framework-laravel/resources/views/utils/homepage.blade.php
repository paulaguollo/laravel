  @extends('layouts.fo')

  @section('content')
  @php
    //consulta a base de dados
      $class = 'Software Developer';

      //consulta a data base select * from students
      $students = ['Bia', 'Luana', 'Jessica', 'Paulinha'];
  @endphp

    <h4>Bem vindo à aplicação de Servidor!</h4>

  @if($class)
    <h3>Olá turma {{$class}}</h3>

    <ul>
    @foreach($students as $item)
    <li>{{$item}}</li>

    @endforeach
  </ul>
  @endif

    <img src="{{asset('img/ted.jpeg')}}" alt="ted">

    <ul>
        <li><a href="{{route('welcome')}}">Welcome</a></li>
        <li><a href="{{route('var.teste')}}">Variáveis</a></li>
        <li><a href="{{route('users.add')}}">Adicionar Utilizador</a></li>
        <li><a href="{{route('all.users')}}">Ver todos os Utilizadores</a></li>
    </ul>

    @endsection
 