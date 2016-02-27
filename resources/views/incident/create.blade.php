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
@if(isset($incident))
{!! Form::model($incident,['url'=>'/incident/'.$incident->id,'method'=>'PATCH']) !!}
@else
{!! Form::open(array('url' => '/incident/store','method'=>'POST')) !!}
@endif
<div class="panel-body">
    {!! Form::label('Description:') !!}
    {!! Form::textarea('description', isset($incident) ? $incident->description : '', 
    array( 
    'class'=>'form-control', 
    'placeholder'=>'description for incident')) !!}

    {!! Form::label('application_id', 'Application:') !!}
    {!! Form::select('application_id', $apps, isset($incident) ? $incident->application->description:'',array('class'=>'form-control')) !!}

    {!! Form::label('type_incident_id', 'Type incident:') !!}
    {!! Form::select('type_incident_id', $types, isset($incident) ? $incident->type_incident->description:'',array('class'=>'form-control')) !!}

    {!! Form::label('priority_id', 'Priority:') !!}
    {!! Form::select('priority_id', $priorities, isset($incident) ? $incident->priority->description:'',array('class'=>'form-control')) !!}

    {!! Form::label('asigned', 'Asigned:') !!}
    {!! Form::select('asigned', $asigned, isset($incident) ? $incident->asigned->name:'',array('class'=>'form-control')) !!}


</div>

<div class="panel-body">
    {!! Form::submit('Save', 
    array('class'=>'btn btn-primary')) !!}
</div>
{!! Form::close() !!}

@endsection