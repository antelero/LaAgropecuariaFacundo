@extends('web.layout.default')

@section('contenido')
<div class="row">
	<div class="col-md-12">
		<div class="box box-info">
			<div class="box-header">
				<h3 class="box-title">Listado de Presupuestos</h3>
			</div>
			<div class="box-body no-padding">

				<table class="table table-striped">
					<thead>
						<tr>
							<th>Nro. de Presupuesto</th>
							<th>Fecha de Solicitud</th>
							<th>Fecha de Vencimiento</th>
							<th>Total del Presupuesto</th>
							<th>Ver Detalle del Presupuesto</th>
							<th></th>
						</tr>
					</thead>
					<tbody>
						@if ($presupuestos->count() != 0)
							@foreach ($presupuestos as $presupuesto)
								@if ($presupuesto->idCliente == Auth::user()->id)
								<tr>
									<td>{{ $presupuesto->id }}</td>
									<td>{{ucwords(Date::parse($presupuesto->fechaPedido)->format('d F Y'))}}</td>
									<td>{{ucwords(Date::parse($presupuesto->fechaVencimiento)->format('d F Y'))}}</td>
									<td>$ {{$presupuesto->total}}</td>
									<td>
										<a class="btn btn-success btn-lg" href="{{url('presupuesto/' . $presupuesto->id)}}">
											<i class="fa fa-file-text-o"></i>
										</a>
									</td>
									<td>
										<a class="btn btn-success btn-lg" href="{{url('presupuesto/imprimir/' . $presupuesto->id)}}">
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
