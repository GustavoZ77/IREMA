@extends('layout')
@section('action-menu')
<a href="{{ URL::to('app/create') }}" class="list-group-item">New</a>
<a href="{{ URL::to('app/')}}" class="list-group-item">Admin</a>
@endsection
@section('content')
<div class="panel-heading">
    @if(isset($ire_app))
    <h4><strong>Showing Application:&nbsp;</strong>{{$ire_app->name}}</h4>
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
    <h5><strong>Name:</strong>&nbsp;<span>{!!$ire_app->name!!}</span></h5>
    <h5><strong>Customer:</strong>&nbsp;<span>{!!$ire_app->customer->stand!!}</span></h5>
    <h5><strong>Description:</strong>&nbsp;<span>{!!$ire_app->description!!}</span></h5>
    <h5><strong>Status:</strong>&nbsp;<span>
    @if ($ire_app->status)
	 	Enabled
    @else
    	Disabled
    @endif</span></h5>
</div>
@endsection

