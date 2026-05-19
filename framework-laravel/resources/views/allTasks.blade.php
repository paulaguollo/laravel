  @extends('layouts.fo')

  @section('content')
</ul>

    <h3>Aqui tem todas as tarefas (dados reais)</h3>
    <table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nome</th>
      <th scope="col">Tarefa</th>
         <th scope="col">Data</th>
            <th scope="col">Estado</th>
            <th></th>
            <th></th>
    </tr>
  </thead>
  <tbody>

    @foreach ($tasksFromDb as $task)

    <tr>
      <th scope="row">{{ $task->id}}</th>
      <td>{{ $task->username }}</td>
      <td>{{ $task->description }}</td>
      <td>{{ $task->due_at }}</td>
      <td>{{$task->status == 1 ? 'concluído': 'execução' }}
    <td><a href="{{route('tasks.view', $task->id )}}" class="btn btn-info">Ver</a></td>
    <td><a href="{{ route('tasks.delete', $task->id) }}" class="btn btn-danger">Apagar</a></td>
      </td>
       
      {{--@if($task->status == 1) 
      concluido 
      @else 
      em execução 
      @endif --}}
    </tr>
    
    @endforeach
  </tbody>
</table>

     <h4>Volte para a HOME <a href="{{route('home')}}">aqui</a></h4>
@endsection