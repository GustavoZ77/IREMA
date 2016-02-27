@extends('layout')
@section('action-menu')
<a href="{{ URL::to('user/create') }}" class="list-group-item">New</a>
<a href="{{ URL::to('user/')}}" class="list-group-item">Admin</a>
@endsection
@section('content')
<div class="panel-heading">
    <h4>User
        @if(isset($user))
        <span class="label label-default">Edit:&nbsp;{{$user->id}}</span>
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
@if(isset($user))
{!! Form::model($user,['url'=>'/user/'.$user->id,'method'=>'PATCH']) !!}
@else
{!! Form::open(array('url' => '/user/store','method'=>'POST')) !!}
@endif
<div class="panel-body">
    {!! Form::label('Name:') !!}
    {!! Form::text('name', isset($user) ? $user->name : '', 
    array( 
    'class'=>'form-control', 
    'placeholder'=>'name')) !!}    

    {!! Form::label('Email:') !!}
    {!! Form::text('email', isset($user) ? $user->email : '', 
    array( 
    'class'=>'form-control', 
    'placeholder'=>'email')) !!}

    @if(!isset($user))
    {!! Form::label('Password:') !!}
    {!! Form::password('password', array('placeholder'=>'Password', 'class'=>'form-control' ) ) !!}

    {!! Form::label('Confirm Password:') !!}
    {!! Form::password('password_confirmation', array('placeholder'=>'Password', 'class'=>'form-control' ) ) !!}
    @endif
    {!! Form::label('customer', 'Customer:') !!}
    {!! Form::select('customer', $customers, isset($user) ? $user->customer->id:'',array('class'=>'form-control')) !!}

    {!! Form::label('type_user', 'Type User:') !!}
    {!! Form::select('type_user', $typeusers, isset($user) ? $user->customer->id:'',array('class'=>'form-control')) !!}

    {!! Form::label('Status:') !!}
    {!! Form::select('status', array('0' => 'Desactivo', '1' => 'Activo'), isset($user) ? $user->status:'', array('class'=>'form-control')) !!} 
</div>

<div class="panel-body">
    {!! Form::submit('Save', 
    array('class'=>'btn btn-primary')) !!}
</div>
{!! Form::close() !!}

@endsection