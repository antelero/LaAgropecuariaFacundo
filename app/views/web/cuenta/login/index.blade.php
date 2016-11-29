@extends('web.layout.default')

@section('contenido')

<div class="row">
	<div class="col-sm-10 col-sm-offset-1">
		<div class="features_items my-account-page">
			<h2 class="title text-center">Bienvenido, por favor ingrese!</h2>
			<div class="custom-page-box-div gray-input">
				<div class="row">
					<div class="col-md-6">
						<legend>Nuevo Cliente</legend>
						<p class="text-justify">
							Al crear una cuenta en nuestro sitio web usted podrá realizar presupuestos, ordenes de compra, consultas, y realizar un seguimiento de los pedidos que ha hecho anteriormente.
						</p>
						<div style="margin-top:80px">
							<a href="{{ url('cuenta/crear') }}" class="btn btn-primary">Registrarse</a>
						</div>
					</div>

					<div class="col-md-6">
						<legend>Ya Soy Cliente</legend>

						@if (Session::has('mensaje'))
							<p class="text-danger">
								<strong>{{ Session::get('mensaje') }}</strong>
							</p>
						@endif

						{{ Form::open() }}
							<div class="form-group row has-error">
								<div class="col-md-3">
									{{ Form::label('email', 'E-Mail:') }}
								</div>
								<div class="col-md-9">
									{{ Form::email('email', null, array('placeholder' => 'Ingrese su e-mail')) }}
									{{ $errors->first('email', '<label class="control-label" for="inputError"><i class="fa fa-times-circle-o"></i> :message</label>') }}
								</div>
							</div>
							<div class="form-group row has-error">
								<div class="col-md-3">
									{{ Form::label('password', 'Password:') }}
								</div>
								<div class="col-md-9">
									{{ Form::password('password', array('placeholder' => 'Insgrese su password')) }}
									{{ $errors->first('password', '<label class="control-label" for="inputError"><i class="fa fa-times-circle-o"></i> :message</label>') }}
								</div>
							</div>
							<div class="form-group">
								<span>
									{{ Form::checkbox('recordarme', null, true) }} Recuérdame?
								</span>
								<span class="forgot-password pull-right">
									<a class="link" href="{{ url('cuenta/recuperar-password') }}">Has olvidado tu contraseña?</a>
								</span>
							</div>

							<button type="submit" class="btn btn-primary">Ingresar</button>

						{{ Form::close() }}

					</div>
				</div>
			</div>
		</div>
	</div>
</div>

@stop
