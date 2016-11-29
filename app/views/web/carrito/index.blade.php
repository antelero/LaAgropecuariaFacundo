@extends('web.layout.default')

@section('contenido')
<div id="cart_items">
	<div class="cart_info">
		<table class="table table-condensed">
			<thead>
				<tr class="cart_menu">
					<td class="image">Producto</td>
					<td class="description"></td>
					<td class="quantity">Cantidad</td>
					<td class="price">Precio</td>
					<td class="descuento">Descuento</td>
					<td class="total">Total</td>
					<td></td>
				</tr>
			</thead>
			<tbody>

				@if (Session::has('agregarProducto') && count(Session::get('agregarProducto')))
					@foreach (Session::get('agregarProducto') as $producto)
						<tr>
							<td class="cart_product">
								<a href=""><img src="{{ asset('assets/imagen/producto/' . $producto['producto']->imagen) }}" alt="" width="25%"></a>
							</td>
							<td class="cart_description">
								<h4><a href="">{{ $producto['producto']->nombre }}</a></h4>
								<p>Codigo: {{ $producto['producto']->id }}</p>
							</td>
							<td class="cart_price">
								<p>{{ $producto['cantidad'] }}</p>
							</td>
							<td class="cart_price">
								<p>$ {{ number_format($producto['producto']->precio, 2, ',', '.') }}</p>
							</td>
							@if ($producto['producto']->promocion == 1)
							<td class="cart_descuento">
								<p>$ {{ number_format($producto['producto']->precio * $producto['producto']->porcentajePromocion / 100, 2, ',', '.') }}</p>
							</td>
							<td class="cart_total">
								<p class="cart_total_price">$ {{ number_format(($producto['producto']->precio - $producto['producto']->precio * $producto['producto']->porcentajePromocion / 100) * $producto['cantidad'], 2, ',', '.') }}</p>
							</td>
							@else
							<td class="cart_descuento">
								<p>$ 0</p>
							</td>
							<td class="cart_total">
								<p class="cart_total_price">$ {{ number_format($producto['producto']->precio * $producto['cantidad'], 2, ',', '.') }}</p>
							</td>
							@endif
							<td class="cart_delete">
								<a class="cart_quantity_delete" href="{{ url('carrito/quitar/' . $producto['producto']->id) }}"><i class="fa fa-times"></i></a>
							</td>
						</tr>
					@endforeach
				@else
					<tr>
						<td colspan="6">
							<h3 class="text-center">No se encontraron articulos</h3>
						</td>
					</tr>
				@endif

			</tbody>
		</table>
	</div>
</div>

<div id="do_action">
	<div class="heading">
		<h3>Qué te gustaría hacer ahora?</h3>
		<p>Elija si tiene un código de descuento o puntos de recompensa que desea utilizar o desea calcular su costo de entrega.</p>
	</div>
	<div class="row">

		<div class="col-sm-6">
			<div class="total_area">
				<ul>
					<li>Sub Total <span>$ {{ number_format(WebCarritoController::calcularTotal(), 2, ',', '.') }}</span></li>
					<li>Eco Tax <span>$2</span></li>
					<li>Shipping Cost <span>Free</span></li>
					<li>Total <span>$ {{ number_format(WebCarritoController::calcularTotal(), 2, ',', '.') }}</span></li>
				</ul>
				<a href="{{ url('carrito/vaciar') }}" class="btn btn-default update">Vaciar Carrito</a>

				@if (Session::has('agregarProducto') && count(Session::get('agregarProducto')))
					<a href="{{url('carrito/guardar/presupuesto')}}" class="btn btn-default check_out">Presupuesto</a>
					<a href="{{url('carrito/guardar/orden-compra')}}" class="btn btn-default check_out">Orden de Compra</a>
				@endif
			</div>
		</div>
	</div>
</div>
@stop
