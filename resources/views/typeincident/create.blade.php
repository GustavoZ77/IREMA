@extends('layout')
@section('action-menu')
<a href="{{ URL::to('priority/create') }}" class="list-group-item">New</a>
<a href="{{ URL::to('priority/')}}" class="list-group-item">Admin</a>
@endsection
@section('content')
<div class="panel-heading">
    <h4>Type Incident
    @if(isset($typeincident))
    <span class="label label-default">Edit:&nbsp;{{$typeincident->id }}</span>
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
@if(isset($typeincident))
{!! Form::model($typeincident,['url'=>'/typeincident/'.$typeincident->id,'method'=>'PATCH']) !!}
@else
{!! Form::open(array('url' => '/typeincident/store','method'=>'POST')) !!}
@endif
<div class="panel-body">
    {!! Form::label('Description:') !!}
    {!! Form::text('description', isset($typeincident) ? $typeincident->description : '', 
    array( 
    'class'=>'form-control', 
    'placeholder'=>'description')) !!}

    {!! Form::label('Status:') !!}
    {!! Form::select('status', array('0' => 'Disabled', '1' => 'Enabled'), isset($typeincident) ? $typeincident->status:'', array('class'=>'form-control')) !!} 
</div>

<div class="panel-body">
    {!! Form::submit('Save', 
    array('class'=>'btn btn-primary')) !!}
</div>
{!! Form::close() !!}

@endsection