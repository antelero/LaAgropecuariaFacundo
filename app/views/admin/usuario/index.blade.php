@extends('admin.layout.default')

@section('migasPan')
	<h1>
		Usuario <small>Listado</small>
	</h1>
	<ol class="breadcrumb">
		<li><a href="{{ url('admin') }}"><i class="fa fa-dashboard"></i> Inicio</a></li>
		<li class="active">Usuario</li>
	</ol>
@stop

@section('contenido')
<div class="row">
	<div class="col-md-12">
		<div class="box box-info">
			<div class="box-header">
				<h3 class="box-title">Listado de Usuarios</h3>
				<div class="box-tools pull-right">
					<a href="{{ url('admin/usuario/create') }}" class="btn btn-primary blanco">Nuevo</a>
				</div>
			</div>
			<div class="box-body no-padding">

				@include('admin.layout.mensaje')

				<table class="table table-striped">
					<thead>
						<tr>
							<th>#</th>
							<th>Apellido</th>
							<th>Nombre</th>
							<th>E-Mail</th>
							<th>Tipo</th>
							<th>Estado</th>
							<th>Avatar</th>
							<th></th>
						</tr>
					</thead>
					<tbody>

					@if ($usuarios->count() != 0)

						@foreach ($usuarios as $usuario)
						<tr>
							<td>{{ $usuario->id }}</td>
							<td>{{ $usuario->apellido }}</td>
							<td>{{ $usuario->nombre }}</td>
							<td>{{ $usuario->email }}</td>
							<td>
								<small class="badge {{ $usuario->tipo_usuario_estilo }}">{{ $usuario->tipo_usuario }}</small>
							</td>
							<td>
								<small class="badge {{ ($usuario->estado == 1) ? 'bg-green' : 'bg-red' }}">{{ $usuario->estado_usuario }}</small>
							</td>
							<td class="text-center">
								@if ($usuario->avatar)
									<img src="{{ asset('assets/imagen/usuario/' . $usuario->avatar) }}" height="25%" alt="{{ $usuario->nombre }}">
								@else
									<img src="{{ asset('assets/admin/img/AvatarUsuario.jpg') }}" height="25%" alt="{{ $usuario->nombre }}">
								@endif
							</td>
							<td class="text-center">
								<a href="{{ url('admin/usuario/' . $usuario->id) }}" class="btn btn-info">
									<i class="fa fa-search-plus"></i>
								</a>

								<a href="{{ url('admin/usuario/' . $usuario->id . '/edit') }}" class="btn btn-warning">
									<i class="fa fa-pencil"></i>
								</a>

								<a href="{{ url('admin/usuario/'. $usuario->id) }}" data-method="DELETE" data-confirm="¿Esta seguro que desea eliminar el Usuario?" class="btn btn-danger">
									<i class="fa fa-times"></i>
								</a>
							</td>
						</tr>
						@endforeach
					@else
						<tr>
							<td colspan="8" class="text-center">
								<h4><strong>No se encontraron registros</strong></h4>
							</td>
						</tr>
					@endif

					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
@stop