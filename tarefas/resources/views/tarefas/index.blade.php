@extends('app')

@section('title', 'Gerenciador de Tarefas')

@section('content')
    <h1>Produtos</h1>
    
    <a href="{{ route('tarefas.create') }}" class="btn btn-default">Nova Tarefa</a>
	 <br />
 	<br />
    
    <table border="1" class="table table-striped table-bordered table-hover">
    <thead>
     <tr>
         <th>Descrição</th>
         <th>Atribuido</th>
         <th>Comentario</th>
         <th>Status</th>
         <th>Ação</th>
     </tr>
     </thead>
     <tbody>
    
    @foreach($tarefas as $tarefa) 
    
     <tr>
         <td>{{ $tarefa->nome }}</td>
         <td>{{ $tarefa->usuario->nome }}</td>
         <td>{{ $tarefa->comentario }}</td>
         <td>{{ $tarefa->estado->nome }}</td>
         <td>
         	<a href="{{ route('tarefas.edit',   ['id'=>$tarefa->id]) }}" class="btn-sm btn-success">Editar</a>
     		<a href="{{ route('tarefas.destroy',['id'=>$tarefa->id]) }}" class="btn-sm btn-danger">Remover</a>
    	 </td>
     </tr>
     @endforeach 
    
     </tbody>
     </table>
@endsection
