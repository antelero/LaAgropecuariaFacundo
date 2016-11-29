@extends('web.layout.default')

@section('contenido')
<div class="row">
	<div class="col-md-12">
		<div class="box box-info">
			<div class="box-header">
				<h3 class="box-title">Detalle de la Orden de Compra Nro. {{$ordenesCompra->id}}</h3>
			</div>
			<div class="box-body no-padding">

				<table class="table table-striped">
					<thead>
						<tr>
							<th>Imagen</th>
							<th>Nombre</th>
							<th>Cantidad</th>
							<th>Precio</th>
							<th>Descuento</th>
							<th>SubTotal</th>

						</tr>
					</thead>
					<tbody>

						@foreach ($detalles as $producto)
						@if ($producto->ordenCompra->id == $ordenesCompra->id)
							<tr>
								<td>
									@if ($producto->producto->imagen)
										<img src="{{ asset('assets/imagen/producto/' . $producto->producto->imagen) }}" height="25%" alt="{{ $producto->producto->nombre }}">
									@else
										<img src="{{ asset('assets/admin/img/ImagenVino.jpg') }}" height="25%" alt="Imagen del Vino">
									@endif
								</td>
								<td>{{ $producto->producto->nombre }}</td>
								<td>{{$producto->cantidad}} u.</td>
								<td>{{$producto->precio}}</td>
								<td>{{ $producto->descuento }}</td>
								<td>{{number_format(($producto->precio - $producto->descuento) * $producto->cantidad, 2, ',', '.' )}}</td>

							</tr>
						@endif
						@endforeach

					</tbody>
				</table>
				<div class="box-tools pull-right">
					<a href="{{ url('orden-compra') }}" class="btn btn-primary blanco">Volver a la Lista de Ordenes de Compra</a>
				</div>
			</div>
		</div>
	</div>
</div>
@stop
