@extends('admin.layout.default')

@section('migasPan')
	<h1>
		Perfil <small>Informacion</small>
	</h1>
	<ol class="breadcrumb">
		<li><a href="{{ url('admin') }}"><i class="fa fa-dashboard"></i> Inicio</a></li>
		<li class="active">Perfil</li>
	</ol>
@stop

@section('contenido')
<div class="row">
	<div class="col-md-8 col-md-offset-2">
		<div class="box box-info">
			<div class="box-header">
				<h3 class="box-title">{{ Auth::user()->nombre_completo }}</h3>
			</div>
			<div class="box-body">

				@include('admin.layout.mensaje')

				<div class="row">
					<div class="col-md-4" align="center">
						@if (Auth::user()->avatar)
							<img src="{{ asset('assets/imagen/usuario/' . Auth::user()->avatar) }}" class="img-circle" alt="Imagen Usuario">
						@else
							<img src="{{ asset('assets/admin/img/AvatarUsuario.jpg') }}" class="img-circle" alt="Imagen Usuario">
						@endif
					</div>
					<div class="col-md-8">
						<table class="table">
							<tbody>
								<tr>
									<td>Nombre:</td>
									<td>{{ Auth::user()->nombre }}</td>
								</tr>
								<tr>
									<td>Apellido:</td>
									<td>{{ Auth::user()->apellido }}</td>
								</tr>
								<tr>
									<td>D.N.I.:</td>
									<td>{{ Auth::user()->dni }}</td>
								</tr>
								<tr>
									<td>Fecha de Nacimiento:</td>
									<td>{{ ucwords(Date::parse(Auth::user()->fechaNacimiento)->format('d \d\e F \d\e Y'))  }}</td>
								</tr>
								<tr>
									<td>Direccion:</td>
									<td>{{ Auth::user()->direccion }}</td>
								</tr>
								<tr>
									<td>Provincia:</td>
									<td>{{ Auth::user()->provincia->nombre }}</td>
								</tr>
								<tr>
									<td>Localidad:</td>
									<td>{{ Auth::user()->localidad }}</td>
								</tr>
								<tr>
									<td>E-Mail:</td>
									<td>{{ Auth::user()->email }}</td>
								</tr>
									<td>Telefono:</td>
									<td>{{ Auth::user()->telefono }}</td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
			</div>

			<div class="box-footer">
				<div class="row">
					<div class="col-md-6">
						<a href="{{ url('admin/perfil/editar') }}" class="btn btn-warning">Editar</a>
						<a href="{{ url('admin') }}" class="btn btn-danger">Cancelar</a>
					</div>
					<div class="col-md-6 text-right">
						<a href="{{ url('admin/perfil/password') }}" class="btn btn-primary">Cambiar Contraseña</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@stop
