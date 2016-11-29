@extends('web.layout.default')

@section('contenido')

<div class="row">
	<div class="col-sm-3">
		<div class="left-sidebar">

			@include('web.sidebar.tipo-producto')
		</div>
	</div>

	<div class="col-sm-9 padding-right">
		<div class="product-details">
			<div class="col-sm-5">
				<div class="view-product">
					<img src="{{ asset('assets/imagen/producto/' . $producto->imagen) }}" alt="">
				</div>
			</div>
			<div class="col-sm-7">
				<div class="product-information">
					<h2>{{ $producto->nombre }}</h2>
					<p>Codigo: #{{ str_pad($producto->id, 5, "0", STR_PAD_LEFT) }}</p>
					<span>
						<span>$ {{ $producto->precio }}</span>
						<label>Cantidad:</label>
						<input type="text" value="1">
						<button type="button" class="btn btn-fefault cart">
							<i class="fa fa-shopping-cart"></i> Agregar
						</button>
					</span>
					<p><b>Disponibilidad:</b> {{ ($producto->cantidad <> 0) ? 'En Stock' : 'Sin Stock' }}</p>
				</div>
			</div>
		</div>

		<div class="category-tab shop-details-tab">
			<div class="col-sm-12">
				<ul class="nav nav-tabs">
					<li class="active">
						<a href="#info" data-toggle="tab">Informacion Basica</a>
					</li>
					<li>
						<a href="#detalle" data-toggle="tab">Detalle</a>
					</li>
				</ul>
			</div>
			<div class="tab-content">
				<div class="tab-pane fade active in" id="info">
					<div class="col-sm-6">
						<p>
							<b>Nombre:</b> {{ $producto->nombre }}
						</p>
						<p>
							<b>Tipo:</b> {{ $producto->tipoProducto->nombre }}
						</p>
					</div>
				</div>

				<div class="tab-pane fade" id="detalle">
					<div class="text-justify">
						<p>
							<b>Detalle del Producto:</b> {{$producto->detalle}}
						</p>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

@stop
