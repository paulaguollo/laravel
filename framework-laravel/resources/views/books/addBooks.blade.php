@extends('layouts.fo')

@section('content')

    <h4>Aqui podes adicionar um livro!</h4>

    <form method="POST" action="{{ route('books.store') }}">
        @csrf

        <div class="mb-3">
            <label class="form-label">Nome do Livro</label>
            <input name="name" required type="text" class="form-control">
            @error('name')
                <p class="text-danger">Nome inválido ou inexistente</p>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Preço Estimado</label>
            <input name="estimated_price" required type="number" step="0.01" class="form-control">
            @error('estimated_price')
                <p class="text-danger">Preço estimado inválido</p>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Preço Pago (opcional)</label>
            <input name="paid_price" type="number" step="0.01" class="form-control">
            @error('paid_price')
                <p class="text-danger">Preço pago inválido</p>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Escolhe o Utilizador</label>
            <select name="user_id" class="form-control">
                <option value="">----</option>
                @foreach ($users as $user)
                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                @endforeach
            </select>
            @error('user_id')
                <p class="text-danger">Utilizador inválido ou inexistente</p>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Adicionar</button>
    </form>

@endsection
