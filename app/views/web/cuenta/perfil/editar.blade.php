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
				<h2 class="title text-center">Actualizar Perfil</h2>

				@include('web.layout.mensaje')

				<div class="custom-page-box-div gray-input">

					{{ Form::model(Auth::user()) }}
						<div class="row">
							<div class="col-sm-12">
								<div class="row">
									<div class="col-sm-6">
										<div class="fieldset">

											<div class="form-group row">
												<div class="col-md-4">
													{{ Form::label('nombre', 'Nombre:') }}
												</div>
												<div class="col-md-8">
													{{ Form::text('nombre', null, array('placeholder' => 'Ingrese su nombre')) }}
												</div>
											</div>
											<div class="form-group row">
												<div class="col-md-4">
													{{ Form::label('apellido', 'Apellido:') }}
												</div>
												<div class="col-md-8">
													{{ Form::text('apellido', null, array('placeholder' => 'Ingrese su apellido')) }}
												</div>
											</div>
											<div class="form-group row">
												<div class="col-md-4">
													{{ Form::label('dni', 'D.N.I.:') }}
												</div>
												<div class="col-md-8">
													{{ Form::text('dni', null, array('placeholder' => 'Ingrese su D.N.I.')) }}
												</div>
											</div>
											<div class="form-group row">
												<div class="col-md-4">
													{{ Form::label('fechaNacimiento', 'Fecha de Nacimiento:') }}
												</div>
												<div class="col-md-8">
													{{ Form::input('date', 'fechaNacimiento', null) }}
												</div>
											</div>
											<div class="form-group row">
												<div class="col-md-4">
													{{ Form::label('email', 'E-Mail:') }}
												</div>
												<div class="col-md-8">
													{{ Form::email('email', null, array('placeholder' => 'Ingrese su e-mail')) }}
												</div>
											</div>
										</div>
									</div>

									<div class="col-sm-6">
										<div class="fieldset">
											<div class="form-group row">
												<div class="col-md-4">
													{{ Form::label('direccion', 'Direccion:') }}
												</div>
												<div class="col-md-8">
													{{ Form::text('direccion', null, array('placeholder' => 'Ingrese su direccion')) }}
												</div>
											</div>
											<div class="form-group row">
												<div class="col-md-4">
													{{ Form::label('provincia', 'Provincia:') }}
												</div>
												<div class="col-md-8">
													{{ Form::select('idProvincia', $provincia, null) }}
												</div>
											</div>
											<div class="form-group row">
												<div class="col-md-4">
													{{ Form::label('localidad', 'Localidad:') }}
												</div>
												<div class="col-md-8">
													{{ Form::text('localidad', null, array('placeholder' => 'Ingrese su localidad')) }}
												</div>
											</div>
											<div class="form-group row">
												<div class="col-md-4">
													{{ Form::label('telefono', 'Telefono:') }}
												</div>
												<div class="col-md-8">
													{{ Form::text('telefono', null, array('placeholder' => 'Ingrese su telefono')) }}
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>

							<div class="col-sm-12">
								<button type="submit" class="btn btn-primary">Actualizar</button>
								<a href="{{ url('cuenta/perfil') }}" class="btn btn-primary">Cancelar</a>
							</div>
						</div>
					{{ Form::close() }}

				</div>
			</div>
		</div>
	</div>

@stop