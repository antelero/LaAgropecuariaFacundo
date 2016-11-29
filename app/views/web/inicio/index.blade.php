@extends('web.layout.default')

@section('slider')
	@include('web.inicio.slider')
@stop

@section('contenido')

<div class="row">
	<div class="col-sm-3">
		<div class="left-sidebar">
			@include('web.sidebar.tipo-producto')
			@include('web.sidebar.servicio')
			@include('web.sidebar.prueba')
		</div>
	</div>

	<div class="col-sm-9 padding-right">
		<div class="features_items">
			<h2 class="title text-center">Articulos Destacados</h2>

			@foreach ($productos->random(3) as $producto)
				<div class="col-sm-4">
					<div class="product-image-wrapper">
						<div class="single-products">
								<div class="productinfo text-center">
									<img src="{{ asset('assets/imagen/producto/' . $producto->imagen) }}" alt="">
									<h2>$ {{ $producto->precio }}</h2>
									<p>{{ $producto->nombre }}</p>

									{{ Form::open(array('url' => 'carrito/agregar', 'class' => 'form-inline carrito')) }}
										{{ Form::hidden('idProducto', $producto->id) }}

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

											<div class="form-group">
												{{ Form::input('number', 'cantidad', '1', array('class' => 'form-control', 'min' => '1', 'max' => '100', 'step' => '1', 'title' => 'Cantidad')) }}
											</div>

											<button type="submit" class="btn btn-default add-to-cart">
												<i class="fa fa-shopping-cart"></i>Agregar
											</button>
										{{ Form::close() }}

									</div>
									<img src="images/home/new.png" class="new" alt="">
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
			@endforeach

		</div>

		<div class="category-tab">
			<div class="col-sm-12">
				<ul class="nav nav-tabs">

					@foreach ($tipoProductos as $tipoProducto)
						<li class="{{ ($tipoProducto->id === $tipoProductoMenu->id) ? 'active' : '' }}">
							<a href="#tipoProducto{{ $tipoProducto->id }}" data-toggle="tab">{{ $tipoProducto->nombre }}</a>
						</li>
					@endforeach

				</ul>
			</div>
			<div class="tab-content">

				@foreach ($tipoProductos as $tipoProducto)

					<div class="tab-pane fade {{ ($tipoProducto->id === $tipoProductoMenu->id) ? 'active in' : '' }}" id="tipoProducto{{ $tipoProducto->id }}" >

						@if ($tipoProducto->producto->count() !== 0)
							@foreach ($tipoProducto->producto as $producto)
								<div class="col-sm-3">
									<div class="product-image-wrapper">
										<div class="single-products">
											<div class="productinfo vino text-center">
												<img src="{{ asset('assets/imagen/producto/' . $producto->imagen) }}" alt="" width="90px">
												<h2>$ {{ $producto->precio }}</h2>
												<p>{{ $producto->nombre }}</p>
												<a href="#" class="btn btn-default add-to-cart">
													<i class="fa fa-shopping-cart"></i>Agregar al carrito
												</a>
											</div>
										</div>
									</div>
								</div>
							@endforeach
						@else
							<div class="col-sm-12">
								<div class="product-image-wrapper">
									<div class="single-products">
										<div class="productinfo text-center">
											<h2>En este tipo de producto no se encontraron vinos</h2>
										</div>
									</div>
								</div>
							</div>
						@endif

					</div>
				@endforeach

			</div>
		</div>
	</div>
</div>

@stop
