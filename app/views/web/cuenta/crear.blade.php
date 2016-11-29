@extends('web.layout.default')

@section('contenido')

<div class="row">
	<div class="col-sm-10 col-sm-offset-1">
		<div class="features_items my-account-page">
			<h2 class="title text-center">Registrarse</h2>

			@include('web.layout.mensaje')

			<div class="custom-page-box-div gray-input">

				{{ Form::open() }}

					<div class="fieldset">
						<legend class="">Sus datos personales</legend>

						<div class="form-group row">
							<div class="col-md-3">
								{{ Form::label('nombre', 'Nombre:') }}
							</div>
							<div class="col-md-6">
								{{ Form::text('nombre', null, array('placeholder' => 'Ingrese su nombre')) }}
							</div>
							<div class="col-md-3">
								<span class="required">*</span>
							</div>
						</div>
						<div class="form-group row">
							<div class="col-md-3">
								{{ Form::label('apellido', 'Apellido:') }}
							</div>
							<div class="col-md-6">
								{{ Form::text('apellido', null, array('placeholder' => 'Ingrese su apellido')) }}
							</div>
							<div class="col-md-3">
								<span class="required">*</span>
							</div>
						</div>
						<div class="form-group row">
							<div class="col-md-3">
								{{ Form::label('fechaNacimiento', 'Fecha de Nacimiento:') }}
							</div>
							<div class="col-md-6">
								{{ Form::input('date', 'fechaNacimiento', null) }}
							</div>
							<div class="col-md-3">
								<span class="required">*</span>
							</div>
						</div>
						<div class="form-group row">
							<div class="col-md-3">
								{{ Form::label('email', 'E-Mail:') }}
							</div>
							<div class="col-md-6">
								{{ Form::email('email', null, array('placeholder' => 'Ingrese su e-mail')) }}
							</div>
							<div class="col-md-3">
								<span class="required">*</span>
							</div>
						</div>
					</div>

					<div class="fieldset">
						<legend>Tu contraseña</legend>

						<div class="form-fields">
							<div class="form-group row">
								<div class="col-md-3">
									{{ Form::label('password', 'Contraseña:') }}
								</div>
								<div class="col-md-6">
									{{ Form::password('password', array('placeholder' => 'Ingrese su contraseña')) }}
								</div>
								<div class="col-md-3">
									<span class="required">*</span>
								</div>
							</div>
							<div class="form-group row">
								<div class="col-md-3">
									{{ Form::label('password_confirmation', 'Confirmar Contraseña:') }}
								</div>
								<div class="col-md-6">
									{{ Form::password('password_confirmation', array('placeholder' => 'Ingrese de nuevo su contraseña')) }}
								</div>
								<div class="col-md-3">
									<span class="required">*</span>
								</div>
							</div>
						</div>
					</div>

					<button type="submit" class="btn btn-primary">Registrar</button>

				{{ Form::close() }}

			</div>
		</div>
	</div>
</div>

@stop