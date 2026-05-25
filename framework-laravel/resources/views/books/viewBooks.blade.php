@extends('layouts.fo')
 
@section('content')
    <h5>Informações do Livro</h5>

        <tr>
      <th scope="row">{{ $books->id}}</th>
      <td>{{ $books->estimated_price }}</td>
      <td>{{ $books->paid_price }}</td>
      <td>{{ $books->name }}</td>
      <td>{{ $books->new_price }}</td>
    <td><a href="{{route('books.view', $books->id )}}" class="btn btn-info">Ver</a></td>
    <td><a href="{{ route('books.delete', $books->id) }}" class="btn btn-danger">Apagar</a></td>     
</td> 
    </tr>
  </tbody>
</table>

     <h4>Volte para a HOME <a href="{{route('home')}}">aqui</a></h4>
@endsection
