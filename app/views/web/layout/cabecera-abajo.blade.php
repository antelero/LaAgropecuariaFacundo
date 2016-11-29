<div class="header-bottom">
	<div class="container">
		<div class="row">
			<div class="col-sm-9">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
				</div>
				<div class="mainmenu pull-left">
					<ul class="nav navbar-nav collapse navbar-collapse">
						<li>
							<a href="{{ url('/') }}" class="{{ Request::is('/') ? 'active' : '' }}">Inicio</a>
						</li>
						<li>
							<a href="{{ url('producto') }}" class="{{ Request::is('producto*') ? 'active' : '' }}">Productos</a>
						</li>

						<li>
							<a href="{{ url('servicio') }}" class="{{ Request::is('servicio*') ? 'active' : '' }}">Servicios</a>
						</li>

						@if (Auth::check())
							<li>
								<a href="{{ url('consulta') }}" class="{{ Request::is('consulta') ? 'active' : '' }}">Consulta</a>
							</li>
						@endif

					</ul>
				</div>
			</div>
			<div class="col-sm-3">
				<div class="search_box pull-right">
					{{ Form::model(Request::all(), array('url' => 'producto', 'method' => 'GET', 'class' => 'pull-right', 'role' => 'search')) }}
						<div class="form-group">
							{{ Form::text('buscar', null, array('placeholder' => 'Buscar')) }}
						</div>
						<button type="submit" class="btn btn-default hidden">Buscar</button>
					{{ Form::close() }}
				</div>
			</div>
		</div>
	</div>
</div>
