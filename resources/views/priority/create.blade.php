@extends('layout')
@section('action-menu')
<a href="{{ URL::to('priority/create') }}" class="list-group-item">New</a>
<a href="{{ URL::to('priority/')}}" class="list-group-item">Admin</a>
@endsection
@section('content')
<div class="panel-heading">
    <h4>Priority
    @if(isset($priority))
    <span class="label label-default">Edit:&nbsp;{{$priority->id }}</span>
    @else
    <span class="label label-default">Create</span>
    @endif
    </h4>
</div>
@if ($errors->any())
<ul class="alert alert-danger" role="alert" >
    @foreach ($errors->all() as $error)
    <li>{{$error}}</li>
    @endforeach
</ul>
@endif
@if(isset($priority))
{!! Form::model($priority,['url'=>'/priority/'.$priority->id,'method'=>'PATCH']) !!}
@else
{!! Form::open(array('url' => '/priority/store','method'=>'POST')) !!}
@endif
<div class="panel-body">
    {!! Form::label('Description:') !!}
    {!! Form::text('description', isset($priority) ? $priority->description : '', 
    array( 
    'class'=>'form-control', 
    'placeholder'=>'description')) !!}

    {!! Form::label('Time Priority:') !!}
    {!! Form::text('time_priority', isset($priority) ? $priority->time_priority:'', 
    array( 
    'class'=>'form-control', 
    'placeholder'=>'time in days')) !!}

    {!! Form::label('Status:') !!}
    {!! Form::select('status', array('0' => 'Desactivo', '1' => 'Activo'), isset($priority) ? $priority->status:'', array('class'=>'form-control')) !!} 
</div>

<div class="panel-body">
    {!! Form::submit('Save', 
    array('class'=>'btn btn-primary')) !!}
</div>
{!! Form::close() !!}

@endsection