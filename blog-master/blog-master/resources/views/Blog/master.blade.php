

<!DOCTYPE html>
<html lang="en">
{{csrf_token()}}
{{csrf_field()}}
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="6iTnq2lwdGJB7pctRUiYU8U8RMqAGuv7GKHYQw1H">

    <title>Laravel</title>

    <!-- Styles -->
    <link href="http://localhost:8080/blog-master/blog-master/public/css/app.css" rel="stylesheet">

    <!-- Scripts -->
    <script>
        window.Laravel = {"csrfToken":"6iTnq2lwdGJB7pctRUiYU8U8RMqAGuv7GKHYQw1H"};
    </script>
</head>
<body>
<div id="app">
    <nav class="navbar navbar-default navbar-static-top">
        <div class="container">
            <div class="navbar-header">

                <!-- Collapsed Hamburger -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <!-- Branding Image -->
                <a class="navbar-brand" href="http://localhost:8080/blog-master/blog-master/public">
                    Laravel
                </a>
            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav">
                    &nbsp;
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                    <li><a href="http://localhost:8080/blog-master/blog-master/public/login">Login</a></li>
                    <li><a href="http://localhost:8080/blog-master/blog-master/public/register">Register</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Register</div>
                    <div class="panel-body">

                        @foreach($users as $user)
                            @if($user->code==0)
                        <form class="form-horizontal" role="form" method="POST" action="http://localhost:8080/blog-master/blog-master/public/master_reset">
                            <input type="hidden" name="_token" value="6iTnq2lwdGJB7pctRUiYU8U8RMqAGuv7GKHYQw1H">

                            <div class="form-group">
                                <label for="name" class="col-md-4 control-label">Name</label>

                                <div class="col-md-6">
                                    {{$user->name}}
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                                <div class="col-md-6">
                                    {{$user->email}}

                                </div>
                            </div>

                            <div class="form-group">
                                <label for="password" class="col-md-4 control-label">Password</label>
                                <div class="col-md-6">
                                    <input id="password" type="password" name="password"  class="form-control">
                                </div>
                            </div>
                            <div>
                                <input type="hidden"name="user_id" value="{{$user->id}}">
                                </div>
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                   Reset
                                </button>
                            </div>
                            <br>
                            <br>
                            <a href="{{ url('user_delete') }}{{'/'.$user->id}}" class="btn btn-lg btn-success col-xs-12">删除用户</a>
                            <br>
                            <br>
                            <div class="form-group">
                                @endif
                                @endforeach

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Scripts -->
<script src="http://localhost:8080/blog-master/blog-master/public/js/app.js"></script>
</body>
</html>
