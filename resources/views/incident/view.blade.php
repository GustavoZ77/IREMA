@extends('layout')
@section('action-menu')
<a href="{{ URL::to('incident/create') }}" class="list-group-item">New</a>
<a href="{{ URL::to('incident/')}}" class="list-group-item">Admin</a>
@endsection
@section('content')
<div class="panel-heading">
    <h4>Incident
        @if(isset($incident))
        <span class="label label-default">Edit:&nbsp;{{$incident->id}}</span>
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
<div class="panel-body">

    <h4><strong>Asigned:</strong>&nbsp;<span>{!! $incident->asigned->name !!}</span></h4>

    <h5><strong>Description:</strong>&nbsp;<span>{!! $incident->description !!}</span></h5>

    <h5><strong>Application:</strong>&nbsp;<span>{!! $incident->application->description !!}</span></h5>

    <h5><strong>Type incident:</strong>&nbsp;<span>{!! $incident->type_incident->description !!}</span></h5>

    <h5><strong>Priority:</strong>&nbsp;<span>{!! $incident->priority->description !!}</span></h5>

    <h5><strong>Status:</strong>&nbsp;<span>{!! $incident->status_incident !!}</span></h5>
</div>
@endsection