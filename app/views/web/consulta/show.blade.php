@extends('web.layout.default')

@section('contenido')
<div class="row">
	<div class="col-md-12">
		<div class="box box-info">
			<div class="box-header">
				<h3 class="box-title">Consulta Nro. {{$consulta->id}}</h3>
			</div>
			<div class="box-body no-padding">

				<div class="box-body">

					<div class="form-group">
						{{ Form::label('idCliente', 'Nombre del Cliente') }}
						{{ Form::text('idCliente', $consulta->user->apellido . ' ' . $consulta->user->nombre, array('class' => 'form-control', 'readonly' => 'readonly')) }}
					</div>

					<div class="form-group">
						{{ Form::label('fechaConsulta', 'Fecha de la Consulta') }}
						{{ Form::text('fechaConsulta', $consulta->fechaConsulta, array('class' => 'form-control', 'readonly' => 'readonly')) }}
					</div>
				@if ($consulta->estado != 0)
					<div class="form-group">
						{{ Form::label('fechaRespuesta', 'Fecha de la Respuesta') }}
						{{ Form::text('fechaRespuesta', $consulta->fechaRespuesta, array('class' => 'form-control', 'readonly' => 'readonly')) }}
					</div>
				@else
					<div class="form-group">
						{{ Form::label('fechaRespuesta', 'Fecha de la Respuesta') }}
						{{ Form::text('fechaRespuesta', '-', array('class' => 'form-control', 'readonly' => 'readonly')) }}
					</div>
				@endif
					<div class="form-group">
						{{ Form::label('asunto', 'Asunto de la Consulta') }}
						{{ Form::text('asunto', $consulta->asunto, array('class' => 'form-control', 'readonly' => 'readonly')) }}
					</div>

					<div class="form-group">
						{{ Form::label('detalle', 'Detalle de la Consulta') }}
						{{ Form::textarea('detalle', $consulta->detalle, array('class' => 'form-control', 'rows' => '5', 'readonly' => 'readonly')) }}
					</div>

				@if ($consulta->estado != 0)
					<div class="form-group">
						{{ Form::label('respuesta', 'Respuesta de la Consulta') }}
						{{ Form::textarea('respuesta', $consulta->respuesta, array('class' => 'form-control', 'rows' => '5', 'readonly' => 'readonly')) }}
					</div>
				@else
					<div class="form-group">
						{{ Form::label('respuesta', 'Respuesta de la Consulta') }}
						<h1>{{ Form::textarea('respuesta', 'LA CONSULTA SE ESTA PROCESANDO, OBTENDRA UNA RESPUESTA LO MAS ANTES POSIBLE, GRACIAS.', array('class' => 'form-control', 'rows' => '5', 'readonly' => 'readonly')) }}</h1>
					</div>
				@endif

				</div>

				<div class="box-tools pull-right">
					<a href="{{ url('consulta/ver') }}" class="btn btn-primary blanco">Volver a la Lista de Consultas</a>
				</div>
			</div>
		</div>
	</div>
</div>
@stop
