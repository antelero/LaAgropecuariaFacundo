@extends('web.layout.default')

@section('contenido')

<div class="row">
	<div class="col-sm-12 text-center">
		<div class="content-404">
			<h1>
				<b>{{ $mensajeVista['titulo'] }}</b>
			</h1>

			<p>
				{{ $mensajeVista['mensaje'] }}
			</p>

			<h2>
				<a href="{{ url('/') }}">Volver al Inicio</a>
			</h2>
		</div>
	</div>
</div>

@stop