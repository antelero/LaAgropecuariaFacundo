@extends('web.layout.default')

@section('contenido')

<div class="row">
	<div class="col-sm-3">
		<div class="left-sidebar">
			@include('web.sidebar.servicio')
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
					</span>
				</div>
			</div>
		</div>

		<div class="category-tab shop-details-tab">
			<div class="col-sm-12">
				<ul class="nav nav-tabs">
					<li class="active">
						<a href="#descripcion" data-toggle="tab">Detalle</a>
					</li>
				</ul>
			</div>
			<div class="tab-content">
				<div class="tab-pane fade active in" id="descripcion">
					<div class="col-sm-12">
						<p class="text-justify">{{ $producto->detalle }}</p>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

@stop
