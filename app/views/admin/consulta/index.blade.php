@extends('admin.layout.default')

@section('migasPan')
	<h1>
		Consulta <small>Listado</small>
	</h1>
	<ol class="breadcrumb">
		<li><a href="{{ url('admin') }}"><i class="fa fa-dashboard"></i> Inicio</a></li>
		<li class="active"><a href="">Consulta</a></li>
	</ol>
@stop

@section('contenido')
<div class="row">
	<div class="col-md-12">
		<div class="box box-info">
			<div class="box-header">
				<h3 class="box-title">Listado de Consultas</h3>
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
							<th>Fecha de la Consulta</th>>
							<th>Fecha de la Respuesta</th>
							<th>Asunto</th>
							<th>Estado</th>
							<th></th>
						</tr>
					</thead>
					<tbody>

					@if ($consultas->count() != 0)

						@foreach ($consultas as $consulta)
						<tr>
						<td>{{ $consulta->id }}</td>
						<td>{{ $consulta->user->apellido .' '. $consulta->user->nombre}}</td>
						<td>{{ $consulta->fechaConsulta }}</td>
						<td>{{ $consulta->fechaRespuesta }}</td>
						<td>{{ $consulta->asunto }}</td>
						<td>
							<small class="{{ ($consulta->estado == 1) ? 'label label-pill label-success' : 'label label-pill label-danger' }}">{{ $consulta->estado_consulta }}</small>
						</td>
							<td>
								<a href="{{ url('admin/consulta/responder/'.$consulta->id) }}" class="btn btn-info">
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
