@extends('admin.layout.default')

@section('migasPan')
	<h1>
		Perfil <small>Editar</small>
	</h1>
	<ol class="breadcrumb">
		<li><a href="{{ url('admin') }}"><i class="fa fa-dashboard"></i> Inicio</a></li>
		<li><a href="{{ url('admin/perfil') }}"><i class="fa fa-user"></i> Perfil</a></li>
		<li class="active">Editar</li>
	</ol>
@stop

@section('contenido')
<div class="row">
	<div class="col-md-10 col-md-offset-1">
		<div class="box box-info">
			<div class="box-header">
				<h3 class="box-title">Editar Perfil</h3>
			</div>

			{{ Form::model(Auth::user(), array('url' => 'admin/perfil/editar', 'method' => 'POST', 'role' => 'form', 'files' => true)) }}
				<div class="box-body">

					@include('admin.layout.mensaje')

					<div class="row">
						<div class="col-md-4">
							<div class="form-group">
								{{ Form::label('email', 'E-Mail') }}
								{{ Form::email('email', null, array('class' => 'form-control', 'placeholder' => 'Ingrese su email')) }}
							</div>
						</div>
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
					</div>

					<div class="row">
						<div class="col-md-4">
							<div class="form-group">
								{{ Form::label('dni', 'D.N.I.') }}
								{{ Form::text('dni', null, array('class' => 'form-control', 'placeholder' => 'Ingrese su D.N.I.')) }}
							</div>
						</div>
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
						<div class="col-md-4">
							<div class="form-group">
								{{ Form::label('telefono', 'Telefono') }}
								{{ Form::text('telefono', null, array('class' => 'form-control', 'placeholder' => 'Ingrese su telefono')) }}
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
							@if (Auth::user()->avatar)
								<img id="imagenUsuario" src="{{ asset('assets/imagen/usuario/' . Auth::user()->avatar) }}" class="img-thumbnail" alt="Imagen Usuario">
							@else
								<img id="imagenUsuario" src="{{ asset('assets/admin/img/AvatarUsuario.jpg') }}" class="img-thumbnail" alt="Imagen Usuario">
							@endif
						</div>
					</div>
				</div>

				<div class="box-footer">
					<input class="btn btn-success" type="submit" value="Actualizar">
					<a href="{{ url('admin/perfil') }}" class="btn btn-danger">Cancelar</a>
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
			document.getElementById('imagenUsuario').src = oFREvent.target.result;
		};
	};
</script>
@stop



{{-- div.row*3>div.col-md-4*3>div.form-group --}}