@extends('layout')
@section('action-menu')
<a href="{{ URL::to('customer/create') }}" class="list-group-item">New</a>
<a href="{{ URL::to('customer/')}}" class="list-group-item">Admin</a>
@endsection
@section('content')
<div class="panel-heading">
    @if(isset($customer))
    <h4><strong>Showing:&nbsp;</strong>{{$customer->stand }}</h4>
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
    <h5><strong>Name:</strong>&nbsp;<span>{!!$customer->name!!}</span></h5>
    <h5><strong>Stand:</strong>&nbsp;<span>{!!$customer->stand!!}</span></h5>
    <h5><strong>Email:</strong>&nbsp;<span>{!!$customer->email!!}</span></h5>
    <h5><strong>Phone:</strong>&nbsp;<span>{!!$customer->phone!!}</span></h5>
    <h5><strong>Address:</strong>&nbsp;<span>{!!$customer->address!!}</span></h5>
    <h5><strong>Status:</strong>&nbsp;<span>
    @if ($customer->status)
	 	Enabled
    @else
    	Disabled
    @endif</span></h5>
</div>
@endsection

