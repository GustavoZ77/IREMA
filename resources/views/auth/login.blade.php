<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>IREMA</title>

        {!! Html::style('assets/css/bootstrap.css') !!}

        <!-- Fonts -->
        <link href='//fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
                <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
                <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>
        <div class="container">
            @if ($errors->any())
            <ul class="alert alert-danger" role="alert" >
                @foreach ($errors->all() as $error)
                <li>{{$error}}</li>
                @endforeach
            </ul>
            @endif
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <div class="panel panel-default">
                        <div class="panel-heading">Login</div>
                        <div class="panel-body">
                            {!! Form::open(['url' => 'auth/login', 'class' => 'form']) !!}
                            <div class="form-group">
                                <label>Email</label>
                                {!! Form::email('email', '', ['class'=> 'form-control']) !!}
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                {!! Form::password('password', ['class'=> 'form-control']) !!}
                            </div>
                            <div class="checkbox">
                                <label><input name="remember" type="checkbox"> Remember me</label>
                            </div>
                            <div>                            
                                {!! Form::submit('login',['class' => 'btn btn-primary']) !!}
                            </div>
                            {!! Form::close() !!}
                        </div> 
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>