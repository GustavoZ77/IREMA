@extends('layout')
@section('action-menu')
<a href="{{ URL::to('customer/create') }}" class="list-group-item">New</a>
<a href="{{ URL::to('customer/')}}" class="list-group-item">Admin</a>
@endsection
@section('content')
<div class="panel-heading">
    <h4>Customer
    @if(isset($customer))
    <span class="label label-default">Edit:&nbsp;{{$customer->id}}</span>
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
@if(isset($customer))
{!! Form::model($customer,['url'=>'/customer/'.$customer->id,'method'=>'PATCH']) !!}
@else
{!! Form::open(array('url' => '/customer/store','method'=>'POST')) !!}
@endif
<div class="panel-body">
    {!! Form::label('Name:') !!}
    {!! Form::text('name', isset($customer) ? $customer->name : '', 
    array( 
    'class'=>'form-control', 
    'placeholder'=>'name')) !!}
    
    {!! Form::label('Stands:') !!}
    {!! Form::text('stand', isset($customer) ? $customer->stand : '', 
    array( 
    'class'=>'form-control', 
    'placeholder'=>'stands')) !!}

    {!! Form::label('Email:') !!}
    {!! Form::text('email', isset($customer) ? $customer->email : '', 
    array( 
    'class'=>'form-control', 
    'placeholder'=>'email')) !!}
    
    {!! Form::label('Phone:') !!}
    {!! Form::text('phone', isset($customer) ? $customer->phone : '', 
    array( 
    'class'=>'form-control', 
    'placeholder'=>'phone')) !!}
    
    {!! Form::label('Address:') !!}
    {!! Form::text('address', isset($customer) ? $customer->address : '', 
    array( 
    'class'=>'form-control', 
    'placeholder'=>'address')) !!}
    
    {!! Form::label('Status:') !!}
    {!! Form::select('status', array('0' => 'Disabled', '1' => 'Enabled'), isset($customer) ? $customer->status:'', array('class'=>'form-control')) !!} 
</div>

<div class="panel-body">
    {!! Form::submit('Save', 
    array('class'=>'btn btn-primary')) !!}
</div>
{!! Form::close() !!}

@endsection