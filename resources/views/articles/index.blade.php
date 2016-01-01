@extends('layout')
@section('content')
<h1>Create a new article</h1>

<ul>
    @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
    @endforeach
</ul>

    <ul>
      @foreach($articles as $art)
      <li>
             echo something here maybe  {{$art->getTitle()}}
      </li>
       @endforeach
     </ul>
@endsection