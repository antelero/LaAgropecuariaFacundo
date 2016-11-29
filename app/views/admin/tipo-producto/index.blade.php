@extends('admin.layout.default')

@section('migasPan')
	<h1>
		Tipo de Producto <small>Listado</small>
	</h1>
	<ol class="breadcrumb">
		<li><a href="{{ url('admin') }}"><i class="fa fa-dashboard"></i> Inicio</a></li>
		<li class="active"><a href="">Tipo de Producto</a></li>
	</ol>
@stop

@section('contenido')
<div class="row">
	<div class="col-md-6 col-md-offset-3">
		<div class="box box-info">
			<div class="box-header">
				<h3 class="box-title">Listado de Tipos de Productos</h3>
				<div class="box-tools pull-right">
					<a href="{{ url('admin/tipo-producto/create') }}" class="btn btn-primary blanco">Nuevo</a>
				</div>
			</div>
			<div class="box-body no-padding">

				@include('admin.layout.mensaje')

				<table class="table table-striped">
					<thead>
						<tr>
							<th>#</th>
							<th>Nombre</th>
							<th></th>
						</tr>
					</thead>
					<tbody>

					@if ($tipoProductos->count() != 0)

						@foreach ($tipoProductos as $tipoProducto)
						<tr>
							<td>{{ $tipoProducto->id }}</td>
							<td>{{ $tipoProducto->nombre }}</td>
							<td>
								<a href="{{ url('admin/tipo-producto/' . $tipoProducto->id) }}" class="btn btn-info">
									<i class="fa fa-search-plus"></i>
								</a>
								<a href="{{ url('admin/tipo-producto/' . $tipoProducto->id . '/edit') }}" class="btn btn-warning">
									<i class="fa fa-pencil"></i>
								</a>
								<a href="{{ url('admin/tipo-producto/' . $tipoProducto->id) }}" class="btn btn-danger" data-method="DELETE" data-confirm="¿Esta seguro que desea eliminar el Tipo de Vino?">
									<i class="fa fa-times"></i>
								</a>
							</td>
						</tr>
						@endforeach

					@else
						<tr>
							<td colspan="3" class="text-center">
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
