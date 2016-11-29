@extends('web.layout.default')

@section('contenido')

<div class="row">
	<div class="col-sm-12 text-center">
		<div class="content-404">
			<h1>
				<b>ORDEN DE COMPRA GUARDADA CON EXITO</b>
			</h1>
			<p>
				Cliente: {{Auth::user()->apellido.' '.Auth::user()->nombre}}
			</p>
			<p>
				Nro.de Orden de Compra:{{$ordenCompra->id}}
			</p>
			<p>
				Fecha de la Orden de Compra:{{ucwords(Date::parse($ordenCompra->fechaPedido)->format('d F Y'))}}
			</p>
			<p>
				¿Que deseas hacer?
			</p>

			<h2>
				<a href="{{ url('/') }}">Volver al Inicio</a>
			</h2>
			<h2>
				<a href="{{ url('carrito/imprimir/orden-compra/'). '/' . $ordenCompra->id }}">Imprimir Orden de Compra</a>
			</h2>
		</div>
	</div>
</div>

@stop
