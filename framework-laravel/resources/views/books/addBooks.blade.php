@extends('layouts.fo')
 
@section('content')
 <h4>Aqui podes adicionar um livro!</h4>
    <form method="POST" action="{{route ('books.store')}}">
      @csrf
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Nome</label>
            <input name="name" required type="text" class="form-control" id="idname" aria-describedby="nameHelp">
             @error('name')
            <p>Nome inválido ou inexistente</p>
            @enderror
        </div>
               <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Preço Estimado</label>
            <input name="price1" required type="number" class="form-control" id="idprice1" aria-describedby="priceHelp">
             @error('estimated_price')
            <p>Preço inválido ou inexistente</p>
            @enderror
        </div>

                       <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Preço Estimado</label>
            <input name="user" required type="text" class="form-control" id="userid" aria-describedby="userHelp">
             @error('user_id')
            <p>User inválido ou inexistente</p>
            @enderror
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label"></label>
            <label for="user-select">Escolha o user:</label>
 
            <select name="user_id" id="user_id">
                <option value="">----</option>
 
                @foreach ($users as $user)
                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                @endforeach
            </select>
            @error('user_id')
                <p>Utilizador invalido ou inexistente</p>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Adicionar</button>
    </form>
@endsection
