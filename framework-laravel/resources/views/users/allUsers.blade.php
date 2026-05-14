  @extends('layouts.fo')

  @section('content')

    <h3>Aqui tens todos os Users</h3>
 
    <p>A pessoa de contacto é {{$contactInfo['name']}} e podes direcionar-se a {{$contactInfo['email']}}</p>
 

    {{-- simulacao base de dados --}}
<p>Também podes entrar em contato com o corpo docente:</p>  

<ul>
@foreach ( $contacts as $user )
<li>{{$user['id']}}: {{$user['name']}}: {{$user['email']}}</li>    
@endforeach
</ul>


    <h4>Volte para a HOME <a href="{{route('home')}}">aqui</a></h4>

@endsection