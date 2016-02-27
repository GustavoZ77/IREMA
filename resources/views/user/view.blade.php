@extends('layout')
@section('action-menu')
<a href="{{ URL::to('customer/create') }}" class="list-group-item">New</a>
<a href="{{ URL::to('customer/')}}" class="list-group-item">Admin</a>
@endsection
@section('content')
<div class="panel-heading">
    @if(isset($user))
    <h4><strong>Showing:&nbsp;</strong>{{$user->id}}</h4>
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
    <h5><strong>Name:</strong>&nbsp;<span>{!!$user->name!!}</span></h5>
    <h5><strong>Email:</strong>&nbsp;<span>{!!$user->email!!}</span></h5>
    <h5><strong>Address:</strong>&nbsp;<span>{!!$user->type_user->description!!}</span></h5>
    <h5><strong>Status:</strong>&nbsp;<span>
    @if ($user->status)
	 	Enabled
    @else
    	Disabled
    @endif</span></h5>

    <div class="panel panel-default">
        <div class="panel-heading">
            Incidents
        </div>
        <div class="panel-body">
            <button class="btn btn-primary" type="button">
                Open <span class="badge">1</span>
            </button>
            <button class="btn btn-primary" type="button">
                Work in progress <span class="badge">3</span>
            </button>
            
            <button class="btn btn-primary" type="button">
                Closed <span class="badge">7</span>
            </button>
        </div>
    </div>
</div>
@endsection

