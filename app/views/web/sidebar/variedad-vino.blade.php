<h2>Variedades de Vinos</h2>

<div class="panel-group category-products">
	<div class="panel panel-default">
		<div class="panel-heading">
			<h4 class="panel-title">
				<a href="{{ url('vino') }}">Todos</a>
			</h4>
		</div>
	</div>

	@foreach ($menuVariedadVinos as $menuVariedadVino)

		@if ($menuVariedadVino->vino->count() !== 0)
			<div class="panel panel-default">
				<div class="panel-heading">
					<h4 class="panel-title">
						<a href="{{ url('vino/variedad-vino/' . $menuVariedadVino->id) }}">
							<span class="pull-right">({{ $menuVariedadVino->vino->count() }})</span>{{ $menuVariedadVino->nombre }}
						</a>
					</h4>
				</div>
			</div>
		@endif

	@endforeach

</div>