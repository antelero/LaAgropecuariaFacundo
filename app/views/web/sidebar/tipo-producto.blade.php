<h2>Tipos de Productos</h2>

<div class="panel-group category-products">
	<div class="panel panel-default">
		<div class="panel-heading">
			<h4 class="panel-title">
				<a href="{{ url('producto') }}">Todos</a>
			</h4>
		</div>
	</div>

	@foreach ($menuTipoProductos as $menuTipoProducto)

		@if ($menuTipoProducto->producto->count() !== 0)
			@if ($menuTipoProducto->id != 6)
			<div class="panel panel-default">
				<div class="panel-heading">
					<h4 class="panel-title">
						<a href="{{ url('producto/tipo-producto/' . $menuTipoProducto->id) }}">
							<span class="pull-right">({{ $menuTipoProducto->producto->count() }})</span>{{ $menuTipoProducto->nombre }}
						</a>
					</h4>
				</div>
			</div>
			@endif
		@endif

	@endforeach

</div>
