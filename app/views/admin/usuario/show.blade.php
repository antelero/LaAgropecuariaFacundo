@extends('admin.layout.default')

@section('migasPan')
	<h1>
		Usuario <small>Mostrar</small>
	</h1>
	<ol class="breadcrumb">
		<li><a href="{{ url('admin') }}"><i class="fa fa-dashboard"></i> Inicio</a></li>
		<li><a href="{{ url('admin/usuario') }}"><i class="fa fa-user"></i> Usuario</a></li>
		<li class="active">Mostrar</li>
	</ol>
@stop

@section('contenido')
<div class="row">
	<div class="col-md-8 col-md-offset-2">
		<div class="box box-info">
			<div class="box-header">
				<h3 class="box-title">Mostrar Usuario</h3>
			</div>

			<div class="box-body">
				<div class="row">
					<div class="col-md-6">
						<h3 class="text-primary">Datos del Usuario</h3>

						<table class="table">
							<tbody>
								<tr>
									<td>Codigo:</td>
									<td># {{ $usuario->id }}</td>
								</tr>
								<tr>
									<td>E-Mail:</td>
									<td>{{ $usuario->email }}</td>
								</tr>
								<tr>
									<td>Tipo:</td>
									<td>
										<small class="badge {{ $usuario->tipo_usuario_estilo }}">{{ $usuario->tipo_usuario }}</small>
									</td>
								</tr>
								<tr>
									<td>Estado:</td>
									<td>
										<small class="badge {{ ($usuario->estado == 1) ? 'bg-green' : 'bg-red' }}">{{ $usuario->estado_usuario }}</small>
									</td>
								</tr>
								<tr>
									<td>Avatar:</td>
									<td>
										@if ($usuario->avatar)
											<img id="avatarUsuario" src="{{ asset('assets/imagen/usuario/' . $usuario->avatar) }}" class="img-thumbnail" alt="Avatar Usuario">
										@else
											<img id="avatarUsuario" src="{{ asset('assets/admin/img/AvatarUsuario.jpg') }}" class="img-thumbnail" alt="Avatar Usuario">
										@endif
									</td>
								</tr>
							</tbody>
						</table>
					</div>

					<div class="col-md-6">
						<h3 class="text-primary">Datos Personales del Usuario</h3>

						<table class="table">
							<tbody>
								<tr>
									<td>Nombre:</td>
									<td>{{ $usuario->nombre }}</td>
								</tr>
								<tr>
									<td>Apellido:</td>
									<td>{{ $usuario->apellido }}</td>
								</tr>
								<tr>
									<td>D.N.I.:</td>
									<td>{{ $usuario->dni }}</td>
								</tr>
								<tr>
									<td>Fecha de Nacimiento:</td>
									<td>{{ ucwords(Date::parse($usuario->fechaNacimiento)->format('d F Y')) }}</td>
								</tr>
								<tr>
									<td>Direccion:</td>
									<td>{{ $usuario->direccion }}</td>
								</tr>
								<tr>
									<td>Telefono:</td>
									<td>{{ $usuario->telefono }}</td>
								</tr>
								<tr>
									<td>Provincia:</td>
									<td>{{ $usuario->provincia->nombre }}</td>
								</tr>
								<tr>
									<td>Localidad:</td>
									<td>{{ $usuario->localidad }}</td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
			</div>

			<div class="box-footer">
				<a href="{{ url('admin/usuario/' . $usuario->id . '/edit') }}" class="btn btn-warning">Editar</a>
				<a href="{{ url('admin/usuario') }}" class="btn btn-danger">Cancelar</a>
			</div>
		</div>
	</div>
</div>
@stop