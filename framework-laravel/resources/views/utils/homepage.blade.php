  @extends('layouts.fo')

  @section('content')

    <h4>Bem vindo à aplicação de Servidor!</h4>

  @if($class)
    <h3>Olá turma {{$class}}</h3>

    <ul>
    @foreach($students as $item)
    <li>{{$item}}</li>

    @endforeach
  </ul>
  @endif

  <h4>informacoes da escola: </h4>
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

    <img src="{{asset('img/ted.jpeg')}}" alt="ted">

    <ul>
        <li><a href="{{route('welcome')}}">Welcome</a></li>
        <li><a href="{{route('var.teste')}}">Variáveis</a></li>
        <li><a href="{{route('users.add')}}">Adicionar Utilizador</a></li>
        <li><a href="{{route('all.users')}}">Ver todos os Utilizadores</a></li>
        <li><a href="{{route('all.tasks')}}">Ver todas as Tarefas</a></li>
    </ul>

    @endsection
 