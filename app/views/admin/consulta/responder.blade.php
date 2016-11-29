@extends('admin.layout.default')

@section('migasPan')
	<h1>
		Consulta <small>Responder</small>
	</h1>
	<ol class="breadcrumb">
		<li><a href="{{ url('admin') }}"><i class="fa fa-dashboard"></i> Inicio</a></li>
		<li><a href="{{ url('admin/consulta') }}"><i class="fa fa-glass"></i> Consulta</a></li>
		<li class="active">Responder</li>
	</ol>
@stop

@section('contenido')
<div class="row">
	<div class="col-md-6 col-md-offset-3">
		<div class="box box-info">
			<div class="box-header">
				<h3 class="box-title">Responder Consulta</h3>
			</div>

			{{ Form::model($consulta, array('url' => 'admin/consulta/responder/'. $consulta->id , 'method' => 'POST', 'role' => 'form', 'files' => true)) }}
				<div class="box-body">

					@include('admin.layout.mensaje')

					<div class="form-group">
						{{ Form::label('idCliente', 'Nombre del Cliente') }}
						{{ Form::text('idCliente', $consulta->user->apellido . ' ' . $consulta->user->nombre, array('class' => 'form-control', 'readonly' => 'readonly')) }}
					</div>

					<div class="form-group">
						{{ Form::label('fechaConsulta', 'Fecha de la Consulta') }}
						{{ Form::text('fechaConsulta', null, array('class' => 'form-control', 'readonly' => 'readonly')) }}
					</div>

					<div class="form-group">
						{{ Form::label('fechaRespuesta', 'Fecha de la Respuesta') }}
						{{ Form::text('fechaRespuesta', Date("Y-m-d"), array('class' => 'form-control', 'readonly' => 'readonly')) }}
					</div>

					<div class="form-group">
						{{ Form::label('asunto', 'Asunto de la Consulta') }}
						{{ Form::text('asunto', null, array('class' => 'form-control', 'readonly' => 'readonly')) }}
					</div>

					<div class="form-group">
						{{ Form::label('detalle', 'Detalle de la Consulta') }}
						{{ Form::textarea('detalle', null, array('class' => 'form-control', 'rows' => '5', 'readonly' => 'readonly')) }}
					</div>
					@if ($consulta->estado == 0)
						<div class="form-group">
							{{ Form::label('respuesta', 'Respuesta de la Consulta') }}
							{{ Form::textarea('respuesta', null, array('class' => 'form-control', 'rows' => '5', 'placeholder' => 'Ingrese la respuesta a la consulta')) }}
						</div>
					@else
						<div class="form-group">
							{{ Form::label('respuesta', 'Respuesta de la Consulta') }}
							{{ Form::textarea('respuesta', null, array('class' => 'form-control', 'rows' => '5', 'readonly' => 'readonly')) }}
						</div>
					@endif

						{{ Form::hidden('estado', 1) }}

				</div>

				<div class="box-footer">
					<input class="btn btn-success" type="submit" value="Guardar">
					<a href="{{ url('admin/consulta') }}" class="btn btn-danger">Cancelar</a>
				</div>
			{{ Form::close() }}

		</div>
	</div>
</div>
@stop