@extends('admin.layout.default')

@section('migasPan')
	<h1>
		Producto <small>Listado</small>
	</h1>
	<ol class="breadcrumb">
		<li><a href="{{ url('admin') }}"><i class="fa fa-dashboard"></i> Inicio</a></li>
		<li class="active"><a href="">Producto</a></li>
	</ol>
@stop

@section('contenido')
<div class="row">
	<div class="col-md-12">
		<div class="box box-info">
			<div class="box-header">
				<h3 class="box-title">Listado de Productos</h3>
				<div class="box-tools pull-right">
					<a href="{{ url('admin/producto-servicio/create') }}" class="btn btn-primary blanco">Nuevo</a>
				</div>
			</div>
			<div class="box-body no-padding">

				@include('admin.layout.mensaje')

				<table class="table table-striped">
					<thead>
						<tr>
							<th>#</th>
							<th>Nombre</th>
							<th>Tipo de Producto</th>>
							<th>Cantidad</th>
							<th>Precio</th>
							<th>En Promocion</th>
							<th>Imagen</th>
							<th></th>
							<th>Agregar a Nota de Pedido</th>
						</tr>
					</thead>
					<tbody>

					@if ($productos->count() != 0)

						@foreach ($productos as $producto)

						<tr>
							<td>{{ $producto->id }}</td>
							<td>{{ $producto->nombre }}</td>
							<td>{{ $producto->tipoProducto->nombre }}</td>
							<td>{{ $producto->cantidad }} u.</td>
							<td>$ {{ $producto->precio }}</td>
							<td><small class="{{ ($producto->promocion == 1) ? 'label label-pill label-success' : 'label label-pill label-danger' }}">{{ $producto->PromocionProducto }}</small>
							</td>
							<td>
								@if ($producto->imagen)
									<img src="{{ asset('assets/imagen/producto/' . $producto->imagen) }}" height="25%" alt="{{ $producto->nombre }}">
								@else
									<img src="{{ asset('assets/admin/img/ImagenVino.jpg') }}" height="25%" alt="Imagen del Producto">
								@endif
							</td>
							<td>
								<a href="{{ url('admin/producto-servicio/' . $producto->id) }}" class="btn btn-info">
									<i class="fa fa-search-plus"></i>
								</a>
								<a href="{{ url('admin/producto-servicio/' . $producto->id . '/edit') }}" class="btn btn-warning">
									<i class="fa fa-pencil"></i>
								</a>
							@if (Auth::user()->tipo == 'admin')
								<a href="{{ url('admin/producto-servicio/' . $producto->id) }}" class="btn btn-danger" data-method="DELETE" data-confirm="¿Esta seguro que desea eliminar el Vino?">
									<i class="fa fa-times"></i>
								</a>
							@endif
							</td>
							<td>
								{{ Form::open(array('url' => 'admin/nota-pedido/agregar', 'class' => 'form-inline carrito')) }}
										{{ Form::hidden('idProducto', $producto->id) }}
										<button type="submit" class="btn btn-default add-to-cart">
											<i class="fa fa-shopping-cart"></i>Agregar
										</button>
										{{ Form::number('cantidad', null, array('class' => 'form-control', 'placeholder' => 'Ingrese la cantidad del producto')) }}
								{{ Form::close() }}
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
