@extends('layouts.fo')

 

@section('content')

    <h5>Info / edição do User</h5>

    <form method="POST" action="{{ route('users.update') }}">
        @csrf
        @method('PUT')
        <input type="hidden" name="id" value="{{ $user->id }}">
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Nome</label>
            <input value="{{ $user->name }}" name="name" required type="text" class="form-control" id="idname"
                aria-describedby="emailHelp">
            @error('name')
                <p>nome inválido ou inexistente</p>
            @enderror
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email address</label>
            <input disabled value="{{ $user->email }}" name="email" type="email" class="form-control"
                id="exampleInputEmail1" aria-describedby="emailHelp">
            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
        </div>

        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Morada</label>
            <input value="{{ $user->adress }}" name="adress" type="text" class="form-control" id="idname"
                aria-describedby="emailHelp">
                <br>
        <button type="submit" class="btn btn-primary">Actualizar</button>
    </form>

    <p>Volte para o menu de opções <a href="{{ route('home') }}">aqui</a></p>
@endsection