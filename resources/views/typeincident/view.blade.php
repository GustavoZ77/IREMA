@extends('layout')
@section('action-menu')
<a href="{{ URL::to('typeincident/create') }}" class="list-group-item">New</a>
<a href="{{ URL::to('typeincident/')}}" class="list-group-item">Admin</a>
@endsection
@section('content')
<div class="panel-heading">
    @if(isset($typeincident))
    <h4><strong>Showing:&nbsp;</strong>{{$typeincident->description }}</h4>
    @else
    <strong>Crear</strong>
    @endif
</div>
@if ($errors->any())
<ul class="alert alert-danger" role="alert" >
    @foreach ($errors->all() as $error)
    <li>{{$error}}</li>
    @endforeach
</ul>
@endif
<div class="panel-body">
    <h5><strong>Description:</strong>&nbsp;<span>{!!$typeincident->description!!}</span></h5>
    <h5><strong>Status:</strong>&nbsp;<span>
    @if ($typeincident->status)
	 	Enabled
    @else
    	Disabled
    @endif</span></h5>
</div>
@endsection

