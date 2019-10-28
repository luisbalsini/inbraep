@extends('app')

@section('title', 'Gerenciador de Tarefas')

 @section('content')
 	<h1>Nova Tarefa</h1>
 	
 	
 	
 	{{ Form::open(['route' => 'tarefas.store']) }}
 	
 	<div class="form-group">
 	
   		@if ($errors->any())
         	<ul class="alert alert-warning">
         		@foreach($errors->all() as $error)
        			<li>{{ $error }}</li>
         		@endforeach
         	</ul>
         @endif
 	
         {!! Form::label('descricao', 'Descricao:') !!}
         <br>
         {!! Form::text('nome', null, ['class'=>'form-control']) !!}
         <br>
         <br>
         {!! Form::label('descricao', 'Atribuido:') !!}
         <br>
         {!! Form::select('usuarios_id', $usuario  , '')    !!}
         
 	</div>

     <div class="form-group">
        <br> 
     	{!! Form::submit('Criar Tarefa', ['class'=>'btn btn-primary']) !!}
     </div>
    
    {{ Form::close() }}
    

 @endsection
