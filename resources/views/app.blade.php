<!DOCTYPE html>
<html lang="es" ng-app="RecursosHumanosApp">
<head>
	<base href="/recursoshumanos/public" />
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Sistema Integral de Recursos Humanos</title>

	<link href="{{ asset('/css/app.css') }}" rel="stylesheet">

	<link href="{{ asset('/css/font-awesome.min.css') }}" rel="stylesheet">
	<link href="{{ asset('css/datepicker3.css') }}" rel="stylesheet" media="screen">
	<link href="{{ asset('/css/estilos.css') }}" rel="stylesheet">

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
	<!-- muestra spinner -->
	<div id="cover">
		<div class="cargando">Esto tomará un segundo <b>:)</b></div>
	</div>
	<nav class="navbar navbar-default">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					<span class="sr-only">Toggle Navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="{{url('/')}}">SIRHUM</a>
			</div>

			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				@if (!Auth::guest())
				<ul class="nav navbar-nav">
					<li><a href="{{ route('empleados.index') }}"><i class="fa fa-users"></i> Empleados</a></li>
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-tags"></i> Catálogos <span class="caret"></span></a>
						<ul class="dropdown-menu" role="menu">
							<?php $catalogos=config('opciones.catalogos')?>
							@for ($i = 0; $i < sizeof($catalogos); $i++)
							<li><a href="{{ route('catalogos.show',$catalogos[$i]) }}"> {{ucfirst($catalogos[$i])}} </a></li>
							@endfor
						</ul>
					</li>
				</ul>
				@endif


				<ul class="nav navbar-nav navbar-right">
					@if (Auth::guest())
						<li><a href="{{ url('/auth/login') }}">Login</a></li>
					@else
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">{{ Auth::user()->username }} <span class="caret"></span></a>
							<ul class="dropdown-menu" role="menu">
								<li><a href="{{ url('/auth/logout') }}">Salir</a></li>
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

	<!-- Datepicker -->
		<script src="{{ URL::asset('js/bootstrap-datepicker.js') }}"></script>
		<script src="{{ URL::asset('js/locales/bootstrap-datepicker.es.js') }}"></script>
		<!-- Angularjs 1.3 -->
		<script src="{{ URL::asset('js/angular.min.js') }}"></script>
		<script src="{{ URL::asset('js/angular-resource.min.js') }}"></script>
		<script src="{{ URL::asset('js/angular-messages.min.js') }}"></script>
		<script src="{{ URL::asset('js/app.js') }}"></script>
		<script src="{{ URL::asset('js/mayus.js') }}"></script>
		<script src="{{ URL::asset('js/generales.js') }}"></script>

		@yield('scripts')
</body>
</html>
