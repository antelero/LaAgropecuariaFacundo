@extends('admin.layout.default')

@section('migasPan')
	<h1>
		Orden de Compra <small>Listado</small>
	</h1>
	<ol class="breadcrumb">
		<li><a href="{{ url('admin') }}"><i class="fa fa-dashboard"></i> Inicio</a></li>
		<li class="active"><a href="">Orden de Compra</a></li>
	</ol>
@stop

@section('contenido')
<div class="row">
	<div class="col-md-12">
		<div class="box box-info">
			<div class="box-header">
				<h3 class="box-title">Listado de Ordenes de Compra</h3>
				<div class="box-tools pull-right">

				</div>
			</div>
			<div class="box-body no-padding">

				@include('admin.layout.mensaje')

				<table class="table table-striped">
					<thead>
						<tr>
							<th>#</th>
							<th>Cliente</th>
							<th>Fecha de la Orden</th>>
							<th>Fecha de la Vencimiento de la Orden</th>
							<th>Estado</th>
							<th></th>
						</tr>
					</thead>
					<tbody>

					@if ($ordenesCompra->count() != 0)

						@foreach ($ordenesCompra as $ordenCompra)
						<tr>
						<td>{{ $ordenCompra->id }}</td>
						<td>{{ $ordenCompra->user->apellido . ' ' . $ordenCompra->user->nombre}}</td>
						<td>{{ucwords(Date::parse($ordenCompra->fechaPedido)->format('d F Y'))}}</td>
						<td>{{ucwords(Date::parse($ordenCompra->fechaVencimiento)->format('d F Y'))}}</td>
						<td>
							<small class="{{ ($ordenCompra->estado == 1) ? 'label label-pill label-success' : 'label label-pill label-danger' }}">{{ $ordenCompra->estado_orden_compra }}</small>
						</td>
							<td>
								<a href="{{ url('admin/orden-compra/'. $ordenCompra->id) }}" class="btn btn-info">
									<i class="fa fa-search-plus"></i>
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
