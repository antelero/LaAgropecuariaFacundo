@extends('admin.layout.default')

@section('migasPan')
	<h1>
		Orden de Compra <small>Mostrar</small>
	</h1>
	<ol class="breadcrumb">
		<li><a href="{{ url('admin') }}"><i class="fa fa-dashboard"></i> Inicio</a></li>
		<li><a href="{{ url('admin/orden-compra') }}"><i class="fa fa-glass"></i> Orden de Compra</a></li>
		<li class="active">Mostrar</li>
	</ol>
@stop

@section('contenido')
<div class="row">
	<div class="col-md-8 col-md-offset-2">
		<div class="box box-info">
			<div class="box-header">
				<h3 class="box-title">Detalle del Orden de Compra Nro. {{$ordenCompra->id}}</h3>
			</div>

			<div class="box-body no-padding">
				{{ Form::open(array('url' => 'admin/orden-compra/actualizar/' . $ordenCompra->id, 'method' => 'POST', 'role' => 'form')) }}
				<table class="table table-striped">
					<thead>
						<tr>
							<th>ID</th>
							<th>Imagen</th>
							<th>Nombre</th>
							<th>Cantidad</th>
							<th>Precio</th>
							<th>SubTotal</th>
						</tr>
					</thead>
					<tbody>

						@foreach ($ordenCompra->ordenDetalleCompra as $producto)
							<tr>
								<td>{{$producto->idProducto}}</td>
								<td>
									@if ($producto->producto->imagen)
										<img src="{{ asset('assets/imagen/producto/' . $producto->producto->imagen) }}" height="25%" alt="{{ $producto->producto->nombre }}">
									@else
										<img src="{{ asset('assets/admin/img/ImagenVino.jpg') }}" height="25%" alt="Imagen del Vino">
									@endif
								</td>
								<td>{{ $producto->producto->nombre }}</td>
								<td>
									<div class="form-group">
										{{ Form::number('cantidad', $producto->cantidad, array('class' => 'form-control', 'readonly' => 'readonly')) }}
									</div>
								</td>
								{{--<td>{{$producto->cantidad}} u.</td>--}}
								<td>{{$producto->precio}}</td>
								<td>{{number_format($producto->precio * $producto->cantidad, 2, ',', '.' )}}</td>
							</tr>
						@endforeach
							<tr>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<th>Total:</th>
								<td>{{ $producto->ordenCompra->total }}</td>
							</tr>
					</tbody>
				</table>
				<div class="box-tools pull-right">
					<a href="{{ url('admin/orden-compra') }}" class="btn btn-primary blanco">Volver a la Lista de Ordenes de Compra</a>
					<input data-confirm="¿Esta seguro de continuar la operacion?" class="btn btn-success" type="submit" value="Cobrar y Actualizar Stock" {{ $ordenCompra->estado == 0 ? '' : 'disabled' }}>
				</div>
				{{ Form::close() }}
			</div>

		</div>
	</div>
</div>


@stop
