@extends('web.layout.default')

@section('contenido')
<div class="row">
	<div class="col-md-12">
		<div class="box box-info">
			<div class="box-header">
				<h3 class="box-title">Listado de Ordenes de Compra</h3>
			</div>
			<div class="box-body no-padding">

				<table class="table table-striped">
					<thead>
						<tr>
							<th>Nro. de Orden de Compra</th>
							<th>Fecha de Solicitud</th>
							<th>Fecha de Vencimiento</th>
							<th>Total de la Orden de Compra</th>
							<th>Ver Detalle de la Orden de Compra</th>
							<th></th>
						</tr>
					</thead>
					<tbody>
						@if ($ordenesCompra->count() != 0)
							@foreach ($ordenesCompra as $ordenCompra)
								@if ($ordenCompra->idCliente == Auth::user()->id)
								<tr>
									<td>{{ $ordenCompra->id }}</td>
									<td>{{ucwords(Date::parse($ordenCompra->fechaPedido)->format('d F Y'))}}</td>
									<td>{{ucwords(Date::parse($ordenCompra->fechaVencimiento)->format('d F Y'))}}</td>
									<td>$ {{$ordenCompra->total}}</td>
									<td>
										<a class="btn btn-success btn-lg" href="{{url('orden-compra/' . $ordenCompra->id)}}">
											<i class="fa fa-file-text-o"></i>
										</a>
									</td>
									<td>
										<a class="btn btn-success btn-lg" href="{{url('orden-compra/imprimir/' . $ordenCompra->id)}}">
											<i class="fa fa-print"></i>
										</a>
									</td>
								</tr>
								@endif
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
