@extends('web.layout.default')

@section('contenido')

	<div class="row">
		<div class="col-sm-3">
			<div class="menu-perfil">
				@include('web.cuenta.sidebar')
			</div>
		</div>

		<div class="col-sm-9">
			<h2 class="title text-center">Perfil</h2>

			@include('web.layout.mensaje')

			<div class="row custom-page-box-div">

				<div class="col-sm-4 text-center">
					@if (Auth::user()->avatar)
						<img src="{{ asset('assets/imagen/usuario/' . Auth::user()->avatar) }}" alt="">
					@else
						<img src="{{ asset('assets/web/images/AvatarUsuario.jpg') }}" alt="">
					@endif

					<div class="row">
						<div class="col-md-12">
							<a href="{{ url('cuenta/perfil/editar') }}" class="btn btn-primary">Editar</a>
							<a href="{{ url('cuenta/perfil/cambiar-password') }}" class="btn btn-primary">Cambiar Contraseña</a>
						</div>
					</div>
				</div>

				<div class="col-sm-8">
					<div class="row">
						<div class="col-sm-12">
							<table class="table">
								<tbody>
									<tr>
										<td>Nombre y Apellido:</td>
										<td>{{ Auth::user()->nombre_completo }}</td>
									</tr>
									<tr>
										<td>D.N.I.:</td>
										<td>{{ str_pad(Auth::user()->dni, 8, '0', STR_PAD_LEFT) }}</td>
									</tr>
									<tr>
										<td>Fecha de Nacimiento:</td>
										<td>{{ ucwords(Date::parse(Auth::user()->fechaNacimiento)->format('d F Y')) }}</td>
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
									<tr>
										<td>Telefono:</td>
										<td>{{ Auth::user()->telefono }}</td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
				</div>

			</div>

		</div>
	</div>

@stop