@extends('layouts.fo')
 
@section('content')
      @if(session('message'))
    <div class="alert alert-success">
        {{session('message')}}
 
@endsection

</ul>

    <h3>Aqui tem todos os livros</h3>
    <table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nome</th>
      <th scope="col">Preço Estimado</th>
        <th scope="col">Preço Estimado - Preço Pago></th>
            <th></th>
    </tr>
  </thead>
  <tbody>

    @foreach ($booksFromDb as $books)

    <tr>
      <th scope="row">{{ $books->id}}</th>
      <td>{{ $books->username }}</td>
      <td>{{ $books->estimated_price }}</td>
      <td>{{ $books->paid_price }}</td>
      <td>{{ $books->new_price }}</td>
      <td>{{$books->status == 1 ? 'concluído': 'execução' }}
    <td><a href="{{route('books.view', $book->id )}}" class="btn btn-info">Ver</a></td>
    <td><a href="{{ route('books.delete', $book->id) }}" class="btn btn-danger">Apagar</a></td>
      </td>
       
    </tr>
    
    @endforeach
  </tbody>
</table>

     <h4>Volte para a HOME <a href="{{route('home')}}">aqui</a></h4>
@endsection
