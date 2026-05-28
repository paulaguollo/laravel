@extends('layouts.fo')
 
@section('content')

    <h4>Aqui podes adicionar utilizadores!</h4>
    <form method="POST" action="{{route ('tasks.store')}}">
      @csrf
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Nome da Tarefa</label>
            <input name="nome" required type="text" class="form-control" id="idname" aria-describedby="emailHelp">
             @error('nome')
            <p>Tarefa inválido ou inexistente</p>
            @enderror
        </div>

                <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Descrição</label>
            <input name="description" required type="text" class="form-control" id="iddescription" aria-describedby="emailHelp">
             @error('description')
            <p>Descrição inválido ou inexistente</p>
            @enderror
            </div>


      <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label"></label>
            <label for="pet-select">Escolha o user:</label>
 
            <select name="user_id" id="user_id">
                <option value="">----</option>
 
                @foreach ($users as $user)
                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                @endforeach
            </select>
            @error('user_id')
                <p>responsavel invalido ou inexistente</p>
            @enderror
        </div>

 
        <button type="submit" class="btn btn-primary">Registrar</button>
    </form>

    <p>Volte para o menu de opções <a href="{{ route('home') }}">aqui</a></p>
@endsection