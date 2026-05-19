@extends('layouts.fo')
 
@section('content')
    <h5>Info da task</h5>


     <tr>
      <th scope="row">{{ $tasks->id}}</th>
      <td>{{ $tasks->nome }}</td>
      <td>{{ $tasks->description }}</td>
      <td>{{ $tasks->due_at }}</td>
      </td>
    </tr>

  </tbody>
</table>

     <h4>Volte para a HOME <a href="{{route('home')}}">aqui</a></h4>
@endsection

