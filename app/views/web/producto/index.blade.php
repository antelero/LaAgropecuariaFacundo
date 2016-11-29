@extends('web.layout.default')


@section('contenido')

<div class="row">
	<div class="col-sm-3">
		<div class="left-sidebar">
			@include('web.sidebar.tipo-producto')
		</div>
	</div>

	<div class="col-sm-9 padding-right">
		<div class="features_items">
			<h2 class="title text-center">Productos</h2>

			@foreach ($productos as $producto)
			@if ($producto->tipoProducto->id != 6)
				<div class="col-sm-4">
					<div class="product-image-wrapper">
						<div class="single-products">
								<div class="productinfo text-center">
									<img src="{{ asset('assets/imagen/producto/' . $producto->imagen) }}" alt="">
									<h2>$ {{ $producto->precio }}</h2>
									<p>{{ $producto->nombre }}</p>

									{{ Form::open(array('url' => 'carrito/agregar', 'class' => 'form-inline carrito')) }}
										{{ Form::hidden('idProducto', $producto->id) }}
										{{ Form::hidden('tipoProducto', 'Producto') }}

										<div class="form-group">
											{{ Form::input('number', 'cantidad', '1', array('class' => 'form-control', 'min' => '1', 'max' => '100', 'step' => '1', 'title' => 'Cantidad')) }}
										</div>

										<button type="submit" class="btn btn-default add-to-cart">
											<i class="fa fa-shopping-cart"></i>Agregar
										</button>
									{{ Form::close() }}

								</div>
								<div class="product-overlay">
									<div class="overlay-content">
										<h2>$ {{ $producto->precio }}</h2>
										<p>{{ $producto->nombre }}</p>

										{{ Form::open(array('url' => 'carrito/agregar', 'class' => 'form-inline carrito')) }}
											{{ Form::hidden('idProducto', $producto->id) }}
											{{ Form::hidden('tipoProducto', 'Producto') }}

											<div class="form-group">
												{{ Form::input('number', 'cantidad', '1', array('class' => 'form-control', 'min' => '1', 'max' => '100', 'step' => '1', 'title' => 'Cantidad')) }}
											</div>

											<button type="submit" class="btn btn-default add-to-cart">
												<i class="fa fa-shopping-cart"></i>Agregar
											</button>
										{{ Form::close() }}

									</div>
								</div>
						</div>
						<div class="choose">
							<ul class="nav nav-pills nav-justified">
								<li>
									<a href="{{ url('producto/detalle/' . $producto->id) }}">
										<i class="fa fa-plus-square"></i>Detalle
									</a>
								</li>

							</ul>
						</div>
					</div>
				</div>
			@endif
			@endforeach

		</div>
		{{ $productos->links()}}
	</div>
</div>

@stop
