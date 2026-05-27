@extends('layouts.fo')

@section('content')

    @if(session('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif

    <br>
    <h3>OFERTA DE LIVROS PARA O VERÃO</h3>
    <br>

    <table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>Nome do Livro</th>
                <th>Utilizador</th>
                <th>Preço Estimado</th>
                <th>Preço Pago</th>
                <th>Diferença</th>
                <th></th>
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
                    <a href="{{ route('books.view', $books->id) }}" class="btn btn-success">Ver</a>
                    <a href="#" class="btn btn-primary">Editar</a>
                    <a href="{{ route('books.delete', $books->id) }}" class="btn btn-danger">Apagar</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>


<p>Quer adicionar um livro? Clique <a href="{{ route('books.add') }}">aqui</a></p>

<br>

<p>Volte para o menu de opções <a href="{{ route('home') }}">aqui</a></p>

@endsection
