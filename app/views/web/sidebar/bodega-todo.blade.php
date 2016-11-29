<h2>Bodegas</h2>

<div class="panel-group category-products">

	@foreach ($menuBodegas as $menuBodega)
		<div class="panel panel-default">
			<div class="panel-heading">
				<h4 class="panel-title">
					<a href="{{ url('bodega/detalle/' . $menuBodega->id) }}">
						<span class="pull-right">({{ $menuBodega->vino->count() }})</span>{{ $menuBodega->nombre }}
					</a>
				</h4>
			</div>
		</div>
	@endforeach

</div>