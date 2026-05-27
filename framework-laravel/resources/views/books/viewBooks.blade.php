@extends('layouts.fo')

@section('content')
<br>
    <h5>INFORMAÇÃO DO LIVRO</h5>
<br>
    <table class="table">
        <tbody>
            <tr>
                <th>#</th>
                <td>{{ $books->id }}</td>
            </tr>
            <tr>
                <th>Nome</th>
                <td>{{ $books->name }}</td>
            </tr>
            <tr>
                <th>Preço Estimado</th>
                <td>{{ $books->estimated_price }} €</td>
            </tr>
            <tr>
                <th>Preço Pago</th>
                <td>{{ $books->paid_price ?? '-' }} €</td>
            </tr>
            <tr>
                <th>Diferença</th>
                <td>
                    @if($books->paid_price !== null)
                        {{ $books->estimated_price - $books->paid_price }} €
                    @else
                        -
                    @endif
                </td>
            </tr>
        </tbody>
    </table>

    <a href="{{ route('books.delete', $books->id) }}" class="btn btn-danger">Apagar</a>
    <a href="{{ route('books.all') }}" class="btn btn-secondary">Voltar</a>

<br>
<br>
<p>Volte para o menu de opções <a href="{{ route('home') }}">aqui</a></p>

@endsection
