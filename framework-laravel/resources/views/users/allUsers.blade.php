  @extends('layouts.fo')

  @section('content')

      @if(session('message'))
    <div class="alert alert-success">
        {{session('message')}}
 
    </div>
    @endif


    <h3>Aqui tens todos os Users</h3>
 
    <p>A pessoa de contacto é {{$contactInfo['name']}} e podes direcionar-se a {{$contactInfo['email']}}</p>
 

    {{-- simulacao base de dados --}}
<p>Também podes entrar em contato com o corpo docente:</p>  

<ul>
@foreach ( $contacts as $user )
<li>{{$user['id']}}: {{$user['name']}}: {{$user['email']}}</li>    
@endforeach
</ul>

    <h3>Aqui tem todos os users(dados reais)</h3>
    <br>
    <form action="">
        <input type="text" name="search">
        <button type="submit">Procurar</button>
    </form>
<br>
    <table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nome</th>
      <th scope="col">Email</th>
      <th></th>
      <th></th>
    </tr>
  </thead>
  <tbody>

    @foreach ($usersFromDb as $user)

    <tr>
      <th scope="row">{{ $user->id}}</th>
      <td>{{ $user->name }}</td>
      <td>{{ $user->email }}</td>
          <td><a href="{{route('users.view',$user->id )}}" class="btn btn-info">Ver</a></td>
          <td><a href="{{ route('users.delete', $user->id) }}" class="btn btn-danger">Apagar</a></td>
        </tr>

    @endforeach
  </tbody>
</table>

     <p>Volte para o menu de opções <a href="{{ route('home') }}">aqui</a></p>
@endsection