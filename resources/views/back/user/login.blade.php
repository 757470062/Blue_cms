
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login | SugarRush - Admin template</title>

    <!-- Bootstrap -->
    <link href="/back/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:900,300,400' rel='stylesheet' type='text/css'>

    <link href="/back/css/sugarrush.css" rel="stylesheet" type="text/css">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body class="login-page">
<div class="animsition">

    <main class="login-container">

        <div class="panel-container">
            <section class="panel">
                <header class="panel-heading">
                    <h1 class="big-logo">SugarCrush</h1>
                    <p>Bootstrap admin template</p>
                </header>
                <div class="panel-body">
                    <form method="POST" action="{{ url('back/login') }}">
                        {{ csrf_field() }}
                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="username">邮箱</label>
                            <input type="text" class="form-control" name="email" id="username" placeholder="邮箱">
                            @if ($errors->has('email'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                            @endif
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password">密码</label>{{-- <a href="recover.html" class="pull-right forgot-link"><small>忘记密码?</small></a>--}}
                            <input type="password" class="form-control" name="password" id="password" placeholder="密码">
                            @if ($errors->has('password'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                            @endif
                        </div>

                        <div class="form-group text-center">
                            <button type="submit" class="btn-login btn btn-primary">登录 <i class="ti-unlock"></i><i class="ti-lock"></i></button>
                        </div>

                      {{--  <hr>
                        <div class="social-login">
                            <p class="text-center">or sign in with</p>
                            <p class="text-center"><a href="dashboard.html"><i class="ti-facebook"></i></a> <a href="dashboard.html"><i class="ti-google"></i></a> <a href="dashboard.html"><i class="ti-twitter"></i></a> </p>
                        </div>
                    </form>
                    <hr>
                    <div class="register-now">
                        Not registered? <a href="register.html">Register now</a>
                    </div>--}}
                </div>
            </section>
        </div>
    </main> <!-- /playground -->

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="/back/js/jquery-1.11.2.min.js"></script>
    <script src="/back/bootstrap/js/bootstrap.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="/back/js/animsition/dist/js/jquery.animsition.min.js"></script>
    <script src="/back/js/login.js"></script>

</div>
</body>
</html>