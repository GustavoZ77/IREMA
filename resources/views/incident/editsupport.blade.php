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
@if($incident->status_incident == 0)
{!! Form::model($incident,['url'=>'/incident/work/'.$incident->id,'method'=>'PATCH']) !!}
@elseif($incident->status_incident == 1)
{!! Form::model($incident,['url'=>'/incident/complete/'.$incident->id,'method'=>'PATCH']) !!}
@endif
<div class="panel-body">

    <h4><strong>Asigned:</strong>&nbsp;<span>{!! $incident->asigned->name !!}</span></h4>

    <h5><strong>Description:</strong>&nbsp;<span>{!! $incident->description !!}</span></h5>

    <h5><strong>Application:</strong>&nbsp;<span>{!! $incident->application->description !!}</span></h5>

    <h5><strong>Type incident:</strong>&nbsp;<span>{!! $incident->type_incident->description !!}</span></h5>

    <h5><strong>Priority:</strong>&nbsp;<span>{!! $incident->priority->description !!}</span></h5>

    @if($incident->status_incident == 1)
    {!! Form::label('Solution:') !!}
    {!! Form::textarea('solution', isset($incident) ? $incident->solution : '', 
    array( 
    'class'=>'form-control', 
    'placeholder'=>'solution for incident')) !!}        
</div>
<div class="panel-body">
    {!! Form::submit('Save', 
    array('class'=>'btn btn-primary')) !!}
</div>
@else
</div>
<div class="panel-body">
    {!! Form::submit('Accept', 
    array('class'=>'btn btn-primary')) !!}
</div>
@endif

{!! Form::close() !!}

@endsection