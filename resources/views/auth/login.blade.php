@extends('app')

@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">Login</div>
				<div class="panel-body">
					<img src="{{ asset('/images/ivea.jpg') }}" alt="" class="center-block"/>
					<h1 class="text-center text-muted">Sistema Integral de Recursos Humanos</h1>
					<br>
					@if (count($errors) > 0)
						<div class="row">
							<div class="alert alert-danger col-md-offset-2 col-md-8">
								<div class="row">
									<div class="col-md-1  text-center">
										<i class="fa fa-shield fa-3x"></i>
									</div>
									<div class="col-md-11">
										<strong>Error de inicio de sesión.</strong><br> Por favor verifique los datos ingresados.
								</div>
							</div>
								<ul>
									<!--
									@foreach ($errors->all() as $error)
										<li>{{ $error }}</li>
									@endforeach
									</div>
								-->
								</ul>
							</div>
						</div>
					@endif

					<form class="form-horizontal" role="form" method="POST" action="{{ url('/auth/login') }}">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
						<div class="form-group">
							<label class="col-md-4 control-label">Usuario</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="username" value="{{ old('username') }}">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Contraseña</label>
							<div class="col-md-6">
								<input type="password" class="form-control" name="password">
							</div>
						</div>

						<div class="form-group">
							<div class="col-md-6 col-md-offset-4">
								<div class="checkbox">
									<label>
										<input type="checkbox" name="remember"> Recuerdame
									</label>
								</div>
							</div>
						</div>

						<div class="form-group">
							<div class="col-md-6 col-md-offset-4">
								<button type="submit" class="btn btn-primary"><i class="fa fa-sign-in"></i> Iniciar sesión</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
