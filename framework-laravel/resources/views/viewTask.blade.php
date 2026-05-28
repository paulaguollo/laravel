@extends('layouts.fo')
 
@section('content')
    <h5>Info e edição da task{{ $task->nome }}</h5>


     <tr>
      <th scope="row">{{ $task->id}}</th>
      <td>{{ $task->nome }}</td>
      <td>{{ $task->description }}</td>
      <td>{{ $task->due_at }}</td>
      </td>
    </tr>

  </tbody>
</table>

     <h4>Volte para a HOME <a href="{{route('home')}}">aqui</a></h4>
@endsection

