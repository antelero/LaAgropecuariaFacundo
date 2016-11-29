<h2>Servicios</h2>

<div class="panel-group category-products">
	<div class="panel panel-default">
		<div class="panel-heading">
			<h4 class="panel-title">
				<a href="{{ url('servicio') }}">Todos</a>
			</h4>
		</div>
	</div>

	@foreach ($productoServicios as $productoServicio)
		@if ($productoServicio->tipoProducto->id == 6)
			<div class="panel panel-default">
				<div class="panel-heading">
					<h4 class="panel-title">
						<a href="{{ url('servicio/detalle/' . $productoServicio->id) }}">
							<span class="pull-right"></span>{{ $productoServicio->nombre }}
						</a>
					</h4>
				</div>
			</div>
		@endif
	@endforeach

</div>
