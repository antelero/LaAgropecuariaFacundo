@extends('admin.layout.default')

@section('migasPan')
	<h1>
		Usuario <small>Editar</small>
	</h1>
	<ol class="breadcrumb">
		<li><a href="{{ url('admin') }}"><i class="fa fa-dashboard"></i> Inicio</a></li>
		<li><a href="{{ url('admin/usuario') }}"><i class="fa fa-user"></i> Usuario</a></li>
		<li class="active">Editar</li>
	</ol>
@stop

@section('contenido')
<div class="row">
	<div class="col-md-10 col-md-offset-1">
		<div class="box box-info">
			<div class="box-header">
				<h3 class="box-title">Editar Usuario</h3>
			</div>

			{{ Form::model($usuario, array('url' => 'admin/usuario/' . $usuario->id . 'edit', 'method' => 'PUT', 'role' => 'form', 'files' => true)) }}
				<div class="box-body">

					@include('admin.layout.mensaje')

					<h4 class="page-header text-primary">Datos del Usuario</h4>

					<div class="row">
						<div class="col-md-4">
							<div class="form-group">
								{{ Form::label('email', 'E-Mail') }}
								{{ Form::email('email', null, array('class' => 'form-control', 'placeholder' => 'Ingrese el email')) }}
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								{{ Form::label('password', 'Contraseña') }}
								{{ Form::password('password', array('class' => 'form-control', 'placeholder' => 'Ingrese la contraseña')) }}
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								{{ Form::label('password_confirmation', 'Repetir Contraseña') }}
								{{ Form::password('password_confirmation', array('class' => 'form-control', 'placeholder' => 'Repita la contraseña')) }}
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-4">
							<div class="form-group">
								{{ Form::label('tipo', 'Tipo de Usuario') }}
								{{ Form::select('tipo', array('' => 'Seleccione el tipo de usuario', 'admin' => 'Administrador', 'usuario' => 'Empleado', 'cliente' => 'Cliente'), null, array('class' => 'form-control')) }}
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								{{ Form::label('estado', 'Estado del Usuario') }}
								{{ Form::select('estado', array('' => 'Seleccione el estado del usuario', '1' => 'Habilitado', '0' => 'Deshabilitado'), null, array('class' => 'form-control')) }}
							</div>
						</div>
					</div>


					<h4 class="page-header text-primary">Datos Personales del Usuario</h4>

					<div class="row">
						<div class="col-md-4">
							<div class="form-group">
								{{ Form::label('nombre', 'Nombre') }}
								{{ Form::text('nombre', null, array('class' => 'form-control', 'placeholder' => 'Ingrese su nombre')) }}
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								{{ Form::label('apellido', 'Apellido') }}
								{{ Form::text('apellido', null, array('class' => 'form-control', 'placeholder' => 'Ingrese su apellido')) }}
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								{{ Form::label('dni', 'D.N.I.') }}
								{{ Form::text('dni', null, array('class' => 'form-control', 'placeholder' => 'Ingrese su D.N.I.')) }}
							</div>
						</div>
					</div>

					<div class="row">

						<div class="col-md-4">
							<div class="form-group">
								{{ Form::label('fechaNacimiento', 'Fecha de Nacimiento') }}
								{{ Form::input('date', 'fechaNacimiento', null, array('class' => 'form-control', 'placeholder' => 'Ingrese su fecha de nacimiento')) }}
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								{{ Form::label('direccion', 'Direccion') }}
								{{ Form::text('direccion', null, array('class' => 'form-control', 'placeholder' => 'Ingrese su direccion')) }}
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								{{ Form::label('telefono', 'Telefono') }}
								{{ Form::text('telefono', null, array('class' => 'form-control', 'placeholder' => 'Ingrese su telefono')) }}
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-md-4">
							<div class="form-group">
								{{ Form::label('idProvincia', 'Provincia') }}
								{{ Form::select('idProvincia', $provincia, null, array('class' => 'form-control')) }}
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								{{ Form::label('localidad', 'Localidad') }}
								{{ Form::text('localidad', null, array('class' => 'form-control', 'placeholder' => 'Ingrese su localidad')) }}
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-md-5 col-md-offset-2">
							<div class="form-group">
								{{ Form::label('avatar', 'Avatar') }}
								{{ Form::file('avatar', array('onchange' => 'mostrarImagen();')) }}
								<p class="help-block">Seleccione una imagen</p>
							</div>
						</div>
						<div class="col-md-3">
							@if ($usuario->avatar)
								<img id="avatarUsuario" src="{{ asset('assets/imagen/usuario/' . $usuario->avatar) }}" class="img-thumbnail" alt="Avatar Usuario">
							@else
								<img id="avatarUsuario" src="{{ asset('assets/admin/img/AvatarUsuario.jpg') }}" class="img-thumbnail" alt="Avatar Usuario">
							@endif
						</div>
					</div>
				</div>

				<div class="box-footer">
					<input class="btn btn-success" type="submit" value="Guardar">
					<a href="{{ url('admin/usuario') }}" class="btn btn-danger">Cancelar</a>
				</div>
			{{ Form::close() }}
		</div>
	</div>
</div>
@stop

@section('script')
<script>
	function mostrarImagen() {
		var oFReader = new FileReader();
		oFReader.readAsDataURL(document.getElementById('avatar').files[0]);

		oFReader.onload = function (oFREvent) {
			document.getElementById('avatarUsuario').src = oFREvent.target.result;
		};
	};
</script>
@stop