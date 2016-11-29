<h2>Bodegas</h2>

<div class="panel-group category-products">
	<div class="panel panel-default">
		<div class="panel-heading">
			<h4 class="panel-title">
				<a href="{{ url('vino') }}">Todos</a>
			</h4>
		</div>
	</div>

	@foreach ($menuBodegas as $menuBodega)

		@if ($menuBodega->vino->count() !== 0)
			<div class="panel panel-default">
				<div class="panel-heading">
					<h4 class="panel-title">
						<a href="{{ url('vino/bodega/' . $menuBodega->id) }}">
							<span class="pull-right">({{ $menuBodega->vino->count() }})</span>{{ $menuBodega->nombre }}
						</a>
					</h4>
				</div>
			</div>
		@endif

	@endforeach

</div>