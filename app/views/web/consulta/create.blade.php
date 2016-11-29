@extends('web.layout.default')

@section('contenido')

	<div class="row">
		<div class="col-sm-3">
			<div class="menu-perfil">
				@include('web.cuenta.sidebar')
			</div>
		</div>

		<div class="col-sm-9">
			<div class="features_items my-account-page">
				<h2 class="title text-center">Consulta</h2>

				{{ Form::open(array('url' => 'consulta/crear', 'method' => 'POST', 'role' => 'form', 'files' => true)) }}
						<div class="box-body">

							@include('admin.layout.mensaje')

							<div class="form-group">
								{{ Form::label('fechaConsulta', 'Fecha de la Consulta') }}
								{{ Form::text('fechaConsulta', Date("Y-m-d") , array('class' => 'form-control', 'readonly'=> 'readonly')) }}
							</div>

							<div class="form-group">
								{{ Form::label('asunto', 'Asunto de la Consulta') }}
								{{ Form::text('asunto', null, array('class' => 'form-control', 'placeholder' => 'Ingrese el Asunto de la Consulta')) }}
							</div>

							<div class="form-group">
								{{ Form::label('detalle', 'Detalle de la Consulta') }}
								{{ Form::textarea('detalle', null, array('class' => 'form-control', 'placeholder' => 'Ingrese su Consulta', 'rows' => '5')) }}
							</div>

								{{ Form::hidden('idCliente', Auth::user()->id) }}
								{{ Form::hidden('estado', 0) }}

						</div>

						<div class="box-footer">
							<input class="btn btn-success" type="submit" value="Guardar">
							<a href="{{ url('consulta') }}" class="btn btn-danger">Cancelar</a>
						</div>
					{{ Form::close() }}

			</div>
		</div>
	</div>

@stop
