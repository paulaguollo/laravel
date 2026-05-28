  @extends('layouts.fo')

  @section('content')

    <h1 >Bem vindo à aplicação de Servidor!</h1>

  @if($class)
    <h6>Olá turma {{$class}}</h6>

    <ul>
    @foreach($students as $item)
    <li>{{$item}}</li>

    @endforeach
  </ul>
  @endif

  <h6>informações da escola: </h6>
  <ul>
 @foreach ($cesaeInfo as $info)
 <li>{{$info}}</li>
  
  @endforeach
</ul>

{{-- <ul>Esses são os dados da escola
<li>{{$cesaeInfo['name']}}</li>
<li>{{$cesaeInfo['adress']}}</li>
<li>{{$cesaeInfo['email']}}</li>
  </ul> --}}

    <ul>
        <li><a href="{{route('welcome')}}">Welcome</a></li>
        <li><a href="{{route('var.teste')}}">Variáveis</a></li>
        <li><a href="{{route('users.add')}}">Adicionar Utilizador</a></li>
        <li><a href="{{route('users.all')}}">Ver todos os Utilizadores</a></li>
        <li><a href="{{route('all.tasks')}}">Ver todas as Tarefas</a></li>
        <li><a href="{{route('tasks.add')}}">Adicionar Tarefas</a></li>
        <li><a href="{{route('books.all')}}">Ver todos os Livros</a></li>
        <li><a href="{{route('books.add')}}">Adicionar Livros</a></li>

    </ul>

        <img src="{{asset('img/ted.jpeg')}}" alt="ted">

    @endsection
 