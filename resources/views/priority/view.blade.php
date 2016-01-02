@extends('layout')
@section('action-menu')
<a href="{{ URL::to('priority/create') }}" class="list-group-item">New</a>
<a href="{{ URL::to('priority/')}}" class="list-group-item">Admin</a>
@endsection
@section('content')
<div class="panel-heading">
    @if(isset($priority))
    <h4><strong>Showing:&nbsp;</strong>{{$priority->description }}</h4>
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
    <h5><strong>Description:</strong>&nbsp;<span>{!!$priority->description!!}</span></h5>
    <h5><strong>Time:</strong>&nbsp;<span>{!!$priority->time_priority!!}</span></h5>
    <h5><strong>Status:</strong>&nbsp;<span>{!!$priority->status!!}</span></h5>
</div>
@endsection

