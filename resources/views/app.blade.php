<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Apps Itjen</title>

	<link href={{asset('css/app.css')}} rel="stylesheet">

	<!-- Fonts -->
	<link href='//fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>
	<style>
        .navbar-brand
        {
            position: absolute;
            width: 100%;
            left: 0;
            top: 0;
            text-align: center;
            margin: auto;
        }

        .navbar-cool{
            border-bottom: 1px solid #fff;
            background: #f27000;
            color: #fff;
            border-radius: 0px
        }

        .navbar-cool a{
            color: #fff;
        }

        .navbar-cool li a:focus, .navbar-cool li a:hover, .navbar-cool li a:active{
            background: #f27010;
        }

        .navbar-cool .open a:focus, .navbar-cool .open a:hover, .navbar-cool .open a:active{
            background: #f27010;
        }

        .ReactModal__Overlay {
          -webkit-perspective: 600;
          perspective: 600;
          opacity: 0;
        }

        .ReactModal__Overlay--after-open {
          opacity: 1;
          transition: opacity 150ms ease-out;
          z-index:9999
        }

        .ReactModal__Content {
          -webkit-transform: scale(0.5) rotateX(-30deg);
        }

        .ReactModal__Content--after-open {
          -webkit-transform: scale(1) rotateX(0deg);
          transition: all 200ms ease-in;
        }

        .ReactModal__Overlay--before-close {
          opacity: 0;
        }

        .ReactModal__Content--before-close {
          -webkit-transform: scale(0.5) rotateX(30deg);
          transition: all 150ms ease-in;
        }

	</style>

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>
<body>
	<nav class="navbar navbar-cool">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					<span class="sr-only">Toggle Navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="{{url('/')}}">APPS ITJEN</a>
			</div>

			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav">
				</ul>

				<ul class="nav navbar-nav navbar-right">
					@if (Auth::guest())
						<li><a href="{{url('login')}}">Login</a></li>
					@else
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">{{ Auth::user()->name }} <span class="caret"></span></a>
							<ul class="dropdown-menu" role="menu">
								<li><a href="{{url('logout')}}">Logout</a></li>
							</ul>
						</li>
					@endif
				</ul>
			</div>
		</div>
	</nav>

	@yield('content')

	<!-- Scripts -->
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/js/bootstrap.min.js"></script>
</body>
</html>
