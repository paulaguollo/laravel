@extends('layouts.fo')
 
@section('content')
    <h5>Info e edição da task</h5>


   <form method="POST" action="{{route ('tasks.update')}}">
      @csrf
      @method('PUT')
      <input type="hidden" name="id" value="{{ $task->id }}">
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Nome da Tarefa</label>
            <input name="nome" value="{{ $task->nome }}" required type="text" class="form-control" id="idname" aria-describedby="emailHelp">
        </div>

                <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Descrição</label>
            <input name="description" value="{{ $task->description }}" type="text" class="form-control" id="iddescription" aria-describedby="emailHelp">

            </div>

        <div class="mb-3">
            <label for="idName" class="form-label">Estado</label>
            <select name="status" id="idStatus" class="form-select">
                <option value="0">Escolha um status</option>
                <option value="0" {{ $task->status == 0 ? 'selected' : '' }}>Pendente
                </option>
                <option value="1" {{ $task->status == 1 ? 'selected' : '' }}>Concluída
                </option>
            </select>
        </div>

        <div class="mb-3">
            <label for="exampleInputDueAt" class="form-label">Feito em</label>
            <input value="{{$task->due_at}}" name="due_at" type="date" class="form-control" id="exampleInputDueAt">
        </div>

 <div class="mb-3">
     
            <label for="pet-select">Escolhe um utilizador:</label>
       <select required name="user_id" id="pet-select">
                <option value="">--Please choose an option--</option>
                @foreach ($users as $user)
                    <option {{$user->id == $task->user_id? 'selected': ''}}   value="{{ $user->id }}">{{ $user->name }}</option>
                @endforeach
 
 
            </select>
 
            @error('user_id')
                <p>user inválido ou inexistente</p>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Atualizar</button>
    </form>
<br>
    <p>Volte para o menu de opções <a href="{{ route('home') }}">aqui</a></p>
@endsection

