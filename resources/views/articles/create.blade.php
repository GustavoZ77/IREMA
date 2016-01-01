@extends('layout')
@section('action-menu')
<a href="/create" class="list-group-item">Crear</a>
<a href="editar" class="list-group-item">Editar</a>
<a href="admin" class="list-group-item">Administrador</a>
@section('content')
<h1>Create a new article</h1>

<ul>
    @foreach($errors->all() as $error)
    <li>{{ $error }}</li>
    @endforeach
</ul>

<div class="flash-message">
    @foreach (['danger', 'warning', 'success', 'info'] as $msg)
    @if(Session::has('alert-' . $msg))

    <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
    @endif
    @endforeach
</div> <!-- end .flash-message -->

{!! Form::open(array('route' => 'article_store', 'class' => 'form')) !!}


<div class="form-group">
    {!! Form::label('Título del articulo') !!}
    {!! Form::textarea('tittle', null, 
    array('required', 
    'class'=>'form-control', 
    'placeholder'=>'título')) !!}
</div>

<div class="form-group">
    {!! Form::submit('Crear', 
    array('class'=>'btn btn-primary')) !!}
</div>
{!! Form::close() !!}
@endsection