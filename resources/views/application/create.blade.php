@extends('layout')
@section('action-menu')
<a href="{{ URL::to('app/create') }}" class="list-group-item">New</a>
<a href="{{ URL::to('app/')}}" class="list-group-item">Admin</a>
@endsection
@section('content')
<div class="panel-heading">
    <h4>Application
    @if(isset($ire_app))
    <span class="label label-default">Edit:&nbsp;{{$ire_app->id}}</span>
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
@if(isset($ire_app))
{!! Form::model($ire_app,['url'=>'/app/'.$ire_app->id,'method'=>'PATCH']) !!}
@else
{!! Form::open(array('url' => '/app/store','method'=>'POST')) !!}
@endif
<div class="panel-body">
    {!! Form::label('Name:') !!}
    {!! Form::text('name', isset($ire_app) ? $ire_app->name : '', 
    array( 
    'class'=>'form-control', 
    'placeholder'=>'name')) !!}
    
    {!! Form::label('Description:') !!}
    {!! Form::text('description', isset($ire_app) ? $ire_app->description : '', 
    array( 
    'class'=>'form-control', 
    'placeholder'=>'description')) !!}
    
    {!! Form::label('customer_id', 'Customer:') !!}
    {!! Form::select('customer_id', $customers, isset($ire_app) ? $ire_app->customer->id:'',array('class'=>'form-control')) !!}

    {!! Form::label('Status:') !!}
    {!! Form::select('status', array('0' => 'Desactivo', '1' => 'Activo'), isset($ire_app) ? $ire_app->status:'', array('class'=>'form-control')) !!} 
</div>

<div class="panel-body">
    {!! Form::submit('Save', 
    array('class'=>'btn btn-primary')) !!}
</div>
{!! Form::close() !!}

@endsection