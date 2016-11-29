@extends('web.layout.default')

@section('contenido')
<div class="row">
	<div class="col-md-12">
		<div class="box box-info">
			<div class="box-header">
				<h3 class="box-title">Listado de Consultas</h3>
			</div>
			<div class="box-body no-padding">

				<table class="table table-striped">
					<thead>
						<tr>
							<th>Nro. de Consulta</th>
							<th>Fecha de Consulta</th>
							<th>Fecha de Respuesta</th>
							<th>Asunto</th>
							<th>Estado</th>
							<th></th>
						</tr>
					</thead>
					<tbody>
						@if ($consultas->count() != 0)
							@foreach ($consultas as $consulta)
								@if ($consulta->idCliente == Auth::user()->id)
								<tr>
									<td>{{ $consulta->id }}</td>
									<td>{{ucwords(Date::parse($consulta->fechaConsulta)->format('d F Y'))}}</td>
									@if ($consulta->estado == 0)
										<td>-----------------------</td>
									@else
										<td>{{ucwords(Date::parse($consulta->fechaRespuesta)->format('d F Y'))}}</td>
									@endif
									<td>{{$consulta->asunto}}</td>
									<td>
										<small class="{{ ($consulta->estado == 1) ? 'label label-pill label-success' : 'label label-pill label-danger' }}">{{ $consulta->estado_consulta }}</small>
									</td>
									<td>
										<a class="btn btn-success btn-lg" href="{{url('consulta/ver/'. $consulta->id)}}">
											<i class="fa fa-file-text-o"></i>
										</a>
									</td>
									<td>
										<a class="btn btn-success btn-lg" href="{{url('/')}}">
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
