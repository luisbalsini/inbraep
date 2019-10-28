@extends('app')

@section('content')
	<h1>Editar Tarefa: {{$tarefa->name}}</h1>

	@if ($errors->any())
 		<ul class="alert alert-warning">
 			@foreach($errors->all() as $error)
 				<li>{{ $error }}</li>
 			@endforeach
 		</ul>
 	@endif

 	{!! Form::open(['route'=>['tarefas.update',$tarefa->id], 'method'=>'put']) !!}

    	{!! Form::label('descricao', 'Descricao:') !!}
         <br>
         {!! Form::text('nome', $tarefa->nome, ['class'=>'form-control']) !!}
         <br>
         <br>
         {!! Form::label('descricao', 'Atribuido:') !!}
         <br>
         {!! Form::select('usuarios_id', $usuario, $tarefa->usuarios_id)  !!}
         
         <br>
         <br>
         {!! Form::label('descricao', 'Comentario:') !!}
         <br>
         {!! Form::textarea('comentario', $tarefa->comentario, ['class'=>'form-control']) !!}
         
         <br>
         <br>
         {!! Form::label('descricao', 'Status:') !!}
         <br>
         {!! Form::select('estados_id', $status  , $tarefa->estados_id)    !!}
 	</div>

     <div class="form-group">
        <br> 
     	{!! Form::submit('Editar Tarefa', ['class'=>'btn btn-primary']) !!}
     </div>

 {!! Form::close() !!}

 @endsection
