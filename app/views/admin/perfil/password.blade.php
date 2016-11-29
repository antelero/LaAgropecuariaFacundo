@extends('admin.layout.default')

@section('migasPan')
	<h1>
		Perfil <small>Cambiar Contraseña</small>
	</h1>
	<ol class="breadcrumb">
		<li><a href="{{ url('admin') }}"><i class="fa fa-dashboard"></i> Inicio</a></li>
		<li><a href="{{ url('admin/perfil') }}"><i class="fa fa-user"></i> Perfil</a></li>
		<li class="active">Cambiar Contraseña</li>
	</ol>
@stop

@section('contenido')
<div class="row">
	<div class="col-md-6 col-md-offset-3">
		<div class="box box-info">
			<div class="box-header">
				<h3 class="box-title">Cambiar Contraseña</h3>
			</div>

			{{ Form::model(Auth::user(), array('url' => 'admin/perfil/password', 'method' => 'POST', 'role' => 'form', 'files' => true)) }}
				<div class="box-body">

					@include('admin.layout.mensaje')

					<div class="form-group">
						{{ Form::label('passwordAnterior', 'Contraseña Anterior') }}
						{{ Form::password('passwordAnterior', array('class' => 'form-control', 'placeholder' => 'Ingrese su contraseña anterior')) }}
					</div>

					<div class="form-group">
						{{ Form::label('password', 'Contraseña Nueva') }}
						{{ Form::password('password', array('class' => 'form-control', 'placeholder' => 'Ingrese su contraseña nueva')) }}
					</div>

					<div class="form-group">
						{{ Form::label('password_confirmation', 'Repetir Contraseña Nueva') }}
						{{ Form::password('password_confirmation', array('class' => 'form-control', 'placeholder' => 'Ingrese de nuevo su contraseña')) }}
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