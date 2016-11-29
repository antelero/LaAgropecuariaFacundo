@extends('web.layout.default')

@section('contenido')

	<div class="row">
		<div class="col-sm-3">
			<div class="menu-perfil">
				@include('web.cuenta.sidebar')
			</div>
		</div>

		<div class="col-sm-9">
			<div class="features_items my-account-page">
				<h2 class="title text-center">Cambiar Contraseña</h2>

				@include('web.layout.mensaje')

				<div class="custom-page-box-div gray-input">

					{{ Form::open() }}
						<div class="row">
							<div class="col-sm-10 col-sm-offset-1">
								<div class="fieldset">
									<div class="form-group row">
										<div class="col-md-4">
											{{ Form::label('passwordAnterior', 'Contraseña Anterior:') }}
										</div>
										<div class="col-md-8">
											{{ Form::password('passwordAnterior', array('placeholder' => 'Ingrese su contraseña anterior')) }}
										</div>
									</div>

									<div class="form-group row">
										<div class="col-md-4">
											{{ Form::label('password', 'Contraseña Nueva:') }}
										</div>
										<div class="col-md-8">
											{{ Form::password('password', array('placeholder' => 'Ingrese su contraseña nueva')) }}
										</div>
									</div>

									<div class="form-group row">
										<div class="col-md-4">
											{{ Form::label('password_confirmation', 'Repetir Contraseña Nueva:') }}
										</div>
										<div class="col-md-8">
											{{ Form::password('password_confirmation', array('placeholder' => 'Ingrese de nuevo su contraseña')) }}
										</div>
									</div>
								</div>
							</div>

							<button type="submit" class="btn btn-primary">Actualizar</button>
							<a href="{{ url('cuenta/perfil') }}" class="btn btn-primary">Cancelar</a>
						</div>
					{{ Form::close() }}

				</div>
			</div>
		</div>
	</div>
</div>
@stop