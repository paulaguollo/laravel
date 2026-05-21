@extends('layouts.fo')
 
@section('content')



    <h4>Aqui podes adicionar utilizadores!</h4>
    <form method="POST" action="{{route ('users.store')}}">
      @csrf
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Nome</label>
            <input name="name" required type="text" class="form-control" id="idname" aria-describedby="emailHelp">
             @error('name')
            <p>Nome inválido ou inexistente</p>
            @enderror
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email address</label>
            <input name="email" required type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            @error('email')
            <p>Email inválido ou inexistente</p>
            @enderror
            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Password</label>
            <input name="password" required type="password" class="form-control" id="exampleInputPassword1">
          @error('password')
            <p>Password inválido ou inexistente</p>
            @enderror
          </div>
 
        <button type="submit" class="btn btn-primary">Registrar</button>
    </form>
@endsection