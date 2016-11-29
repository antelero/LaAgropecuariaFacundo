@extends('admin.layout.default')

@section('migasPan')
	<h1>
		Servicio <small>Listado</small>
	</h1>
	<ol class="breadcrumb">
		<li><a href="{{ url('admin') }}"><i class="fa fa-dashboard"></i> Inicio</a></li>
		<li class="active"><a href="">Servicio</a></li>
	</ol>
@stop

@section('contenido')
<div class="row">
	<div class="col-md-12">
		<div class="box box-info">
			<div class="box-header">
				<h3 class="box-title">Listado de Servicios</h3>
				<div class="box-tools pull-right">
					<a href="{{ url('admin/servicio/create') }}" class="btn btn-primary blanco">Nuevo</a>
				</div>
			</div>
			<div class="box-body no-padding">

				@include('admin.layout.mensaje')

				<table class="table table-striped">
					<thead>
						<tr>
							<th>#</th>
							<th>Nombre</th>
							<th>Precio</th>
							<th>Imagen</th>
							<th></th>
						</tr>
					</thead>
					<tbody>

					@if ($servicios->count() != 0)

						@foreach ($servicios as $servicio)
						<tr>
							<td>{{ $servicio->id }}</td>
							<td>{{ $servicio->nombre }}</td>
							<td>$ {{ $servicio->precio }}</td>
							<td>
								@if ($servicio->imagen)
									<img src="{{ asset('assets/imagen/servicio/' . $servicio->imagen) }}" height="25%" alt="{{ $producto->nombre }}">
								@else
									<img src="{{ asset('assets/admin/img/ImagenVino.jpg') }}" height="25%" alt="Imagen del Servicio">
								@endif
							</td>
							<td>
								<a href="{{ url('admin/servicio/' . $servicio->id) }}" class="btn btn-info">
									<i class="fa fa-search-plus"></i>
								</a>
								<a href="{{ url('admin/servicio/' . $servicio->id . '/edit') }}" class="btn btn-warning">
									<i class="fa fa-pencil"></i>
								</a>
								<a href="{{ url('admin/servicio/' . $servicio->id) }}" class="btn btn-danger" data-method="DELETE" data-confirm="¿Esta seguro que desea eliminar el Servicio?">
									<i class="fa fa-times"></i>
								</a>
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
