<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Laravel</title>

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
        <div class="page-header">
             <h1>IREMA<small>&nbsp;Incident Record Manager</small>
                <small class="pull-right" >
                    @if(Auth::check())
                    <span class="label label-primary" style="font-size: 0.5em;" >Welcome:&nbsp;{{Auth::user()->name}}</span>
                    {!! HTML::link('auth/logout', 'Logout', array('class' => 'btn btn-default')) !!}
                    {!! HTML::link('auth/logout', 'Change password', array('class' => 'btn btn-default')) !!}
                    @else
                    {!! HTML::link('auth/login', 'Login', array('class' => 'btn btn-default')) !!}
                    @endif
                </small>
            </h1>
            @include('flash::message')
        </div>
        @if(Auth::check())
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <a class="navbar-brand" href="{{ URL::to('incident/create') }}" >Create Incident</a>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        <li class="dropdown">
                            <a href="{{ URL::to('incident') }}" class="dropdown-toggle" role="button" aria-haspopup="true" aria-expanded="false">Incidents</a>
                        </li>
                        <li class="dropdown">
                            <a href="{{ URL::to('user') }}" class="dropdown-toggle" role="button" aria-haspopup="true" aria-expanded="false">Users</a>
                        </li>
                        <li class="dropdown">
                            <a href="{{ URL::to('app') }}" class="dropdown-toggle" role="button" aria-haspopup="true" aria-expanded="false">Applications</a>
                        </li>

                        <li class="dropdown">
                            <a href="{{ URL::to('customer') }}" class="dropdown-toggle"  role="button" aria-haspopup="true" aria-expanded="false">Customers</a>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Catalogs <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="{{ URL::to('priority') }}">Priority</a></li>
                                <li><a href="{{ URL::to('typeincident') }}">Incident Type</a></li>
                            </ul>
                        </li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <form class="navbar-form navbar-left" role="search">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Search">
                            </div>
                            <button type="submit" class="btn btn-default">Search</button>
                        </form>
                    </ul>    
                </div><!-- /.navbar-collapse -->
            </div><!-- /.container-fluid -->
        </nav>
       @endif
        <div class="panel panel-default">
            <div class="panel-body">
                <div class="col-md-2 col-md-offset-0 inline pull-left">
                    <div class="panel panel-default">
                        <div class="panel-heading">Menu</div>
                        <div class="panel-body">
                            <ul class="list-group">
                                @yield('action-menu')    
                            </ul>
                        </div>    
                    </div>
                </div>
                <div class="col-md-10 col-md-offset-0 pull-right">
                    <div class="panel panel-default ">
                        <!-- Modal Dialog -->
                        <div class="modal fade" id="confirmDelete" role="dialog" aria-labelledby="confirmDeleteLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                        <h4 class="modal-title">Delete Parmanently</h4>
                                    </div>
                                    <div class="modal-body">
                                        <p>Are you sure about this ?</p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                        <button type="button" class="btn btn-danger" id="confirm">Delete</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @yield('content')
                    </div>
                </div>
            </div>
        </div>
        <!-- Scripts -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        {!! Html::script('assets/js/bootstrap.min.js') !!}
       
        <script>
        <!-- Dialog show event handler -->
        $('#confirmDelete').on('show.bs.modal', function (e) {
        $message = $(e.relatedTarget).attr('data-message');
        $(this).find('.modal-body p').text($message);
        $title = $(e.relatedTarget).attr('data-title');
        $(this).find('.modal-title').text($title);

        // Pass form reference to modal for submission on yes/ok
        var form = $(e.relatedTarget).closest('form');
        $(this).find('.modal-footer #confirm').data('form', form);
        });

        <!-- Form confirm (yes/ok) handler, submits form -->
        $('#confirmDelete').find('.modal-footer #confirm').on('click', function(){
        $(this).data('form').submit();
        });
        </script>
        <script>
            $('div.alert').not('.alert-important')-delay(3000).slideUp(300);
        </script>
    </body>
</html>