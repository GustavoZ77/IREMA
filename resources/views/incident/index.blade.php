@extends('layout')
@section('action-menu')
<a href="{{ URL::to('incident/create') }}" class="list-group-item">New</a>
<a href="{{ URL::to('incident/')}}" class="list-group-item">Admin</a>
@endsection
@section('content')
<div class="panel-heading"><h4>Admin Incidents</h4></div>

<div class="panel-body">
    <ul>
        @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>

    <div class="flash-message">
        @foreach (['danger', 'warning', 'success', 'info'] as $msg)
        @if(Session::has('alert-' . $msg))

        <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
        @endif
        @endforeach
    </div> <!-- end .flash-message -->
    <table class="table">
        @foreach($incidents as $p)
        <th>Type</th>
        <th>Application</th>
        <th>Asgined</th>
        <th>Created</th>
        <th>Status</th>
        <th>Operations</th>
        <tr>
            <td>{{ $p->type_incident->description }}</td>
            <td>{{ $p->application->name }}</td>
            <td>{{ $p->asigned->name }}</td>
            <td>{{ $p->entered_by->name }}</td>
            <td>@if ($p->status_incident == 0)
            Scheduled
            @elseif($p->status_incident == 1)
            Work in progress
            @elseif($p->status_incident == 2)
            Complete
            @endif
            </td>
            <td>
                <div class="btn-group" role="group" aria-label="...">
                    <a href="{{ URL::to('incident/view')."/".$p->id }}" class="btn btn-default">View</a>
                    <a href="{{ URL::to('incident/edit')."/".$p->id }}" class="btn btn-default">Edit</a>
                    {!! Form::open(array('url' => 'customer/' . $p->id, 'class' => 'pull-right')) !!}
                    {!! Form::hidden('_method', 'DELETE') !!}
                    {!! Form::button('Borrar', array('class' => 'btn btn-warning',
                    'data-target'=>'#confirmDelete','data-message'=>'Are you sure delete this customer?','data-toggle'=>'modal')) !!}                   
                    {!! Form::close() !!}
                </div>
            </td>
        </tr>
        @endforeach
    </table>
</div>
@endsection