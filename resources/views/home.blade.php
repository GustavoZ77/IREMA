@extends('layout')
@section('action-menu')
@endsection
@section('content')
                <div class="jumbotron">
                    <h1>Welcome!</h1>
                    <p>IREMA is an incident manamgent application which allows you to track all the activities related to each incident</p>
                    <p><a class="btn btn-primary btn-lg" href="{{ URL::to('incident') }}" role="button">Vew incidents</a></p>
                </div>
@endsection
