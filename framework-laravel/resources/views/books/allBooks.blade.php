@extends('layouts.fo')

@section('content')

    @if(session('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif

    <h3>Aqui tem todos os livros</h3>

    <table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>Nome do Livro</th>
                <th>Utilizador</th>
                <th>Preço Estimado</th>
                <th>Preço Pago</th>
                <th>Diferença</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($booksFromDb as $books)
            <tr>
                <td>{{ $books->id }}</td>
                <td>{{ $books->name }}</td>
                <td>{{ $books->username }}</td>
                <td>{{ $books->estimated_price }} €</td>
                <td>{{ $books->paid_price ?? '-' }} €</td>
                <td>
                    @if($books->paid_price !== null)
                        {{ $books->estimated_price - $books->paid_price }} €
                    @else
                        -
                    @endif
                </td>
                <td>
                    <a href="{{ route('books.view', $books->id) }}" class="btn btn-info">Ver</a>
                    <a href="{{ route('books.delete', $books->id) }}" class="btn btn-danger">Apagar</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <h4>Volte para a HOME <a href="{{ route('home') }}">aqui</a></h4>

@endsection
