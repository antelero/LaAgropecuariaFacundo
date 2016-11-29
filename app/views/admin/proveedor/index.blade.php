@extends('admin.layout.default')

@section('migasPan')
	<h1>
		Proveedor <small>Listado</small>
	</h1>
	<ol class="breadcrumb">
		<li><a href="{{ url('admin') }}"><i class="fa fa-dashboard"></i> Inicio</a></li>
		<li class="active"><a href="">Proveedor</a></li>
	</ol>
@stop

@section('contenido')
<div class="row">
	<div class="col-md-12">
		<div class="box box-info">
			<div class="box-header">
				<h3 class="box-title">Listado de Proveedores</h3>
				<div class="box-tools pull-right">
					<a href="{{ url('admin/proveedor/create') }}" class="btn btn-primary blanco">Nuevo</a>
				</div>
			</div>
			<div class="box-body no-padding">

				@include('admin.layout.mensaje')

				<table class="table table-striped">
					<thead>
						<tr>
							<th>#</th>
							<th>Nombre</th>
							<th>Direccion</th>>
							<th>Telefono</th>
							<th>Estado</th>
							<th>Imagen</th>
							<th></th>
						</tr>
					</thead>
					<tbody>

					@if ($proveedores->count() != 0)

						@foreach ($proveedores as $proveedor)

						<tr>
							<td>{{ $proveedor->id }}</td>
							<td>{{ $proveedor->nombre }}</td>
							<td>{{ $proveedor->direccion }}</td>
							<td>{{ $proveedor->telefono }}</td>
							<td>{{ $proveedor->estado }}</td>
							<td>
								@if ($proveedor->imagen)
									<img src="{{ asset('assets/imagen/proveedor/' . $proveedor->imagen) }}" height="25%" alt="{{ $proveedor->nombre }}">
								@else
									<img src="{{ asset('assets/admin/img/ImagenVino.jpg') }}" height="25%" alt="Imagen del Proveedor">
								@endif
							</td>
							<td>
								<a href="{{ url('admin/proveedor/' . $proveedor->id) }}" class="btn btn-info">
									<i class="fa fa-search-plus"></i>
								</a>
								<a href="{{ url('admin/proveedor/' . $proveedor->id . '/edit') }}" class="btn btn-warning">
									<i class="fa fa-pencil"></i>
								</a>
							@if (Auth::user()->tipo == 'admin')
								<a href="{{ url('admin/proveedor/' . $proveedor->id) }}" class="btn btn-danger" data-method="DELETE" data-confirm="¿Esta seguro que desea eliminar al Proveedor?">
									<i class="fa fa-times"></i>
								</a>
							@endif
							</td>
						</tr>

						@endforeach
					@else
						<tr>
							<td colspan="10" class="text-center">
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
