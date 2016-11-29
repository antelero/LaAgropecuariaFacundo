<div class="header-middle">
	<div class="container">
		<div class="row">
			<div class="col-sm-4">
				<div class="logo pull-left">
					<a href="index.html">
						<img src="{{ asset('assets/web/images/home/LogoAgropecuariaChiquito.png') }}" alt="">
					</a>
				</div>
			</div>
			<div class="col-sm-8">
				<div class="shop-menu pull-right">
					<ul class="nav navbar-nav">

						@if (Auth::check())
							<li class="dropdown mainmenu">
								<a href="{{ url('cuenta') }}" class="{{ Request::is('cuenta*') ? 'active' : '' }}">
									<i class="fa fa-user"></i> {{ Auth::user()->nombreCompleto }} <i class="fa fa-angle-down"></i>
								</a>
								<ul role="menu" class="sub-menu">
									<li>
										<a href="{{ url('cuenta/perfil') }}" class="{{ (Request::is('cuenta/perfil') or Request::is('cuenta/perfil/editar')) ? 'active' : '' }}">Perfil</a>
									</li>
									<li>
										<a href="{{ url('cuenta/perfil/cambiar-password') }}" class="{{ Request::is('cuenta/perfil/cambiar-password') ? 'active' : '' }}">Cambiar Contraseña</a>
									</li>
								</ul>
							</li>
							<li>
								<a href="{{ url('presupuesto') }}">
									<i class="fa fa-star"></i> Lista de Presupuestos
								</a>
							</li>
							<li>
								<a href="{{ url('orden-compra') }}">
									<i class="fa fa-star"></i> Lista de Ordenes de Compra
								</a>
							</li>
							<li>
								<a href="{{ url('carrito') }}">
									<i class="fa fa-shopping-cart"></i> Carrito

									@if (count(Session::get('agregarProducto')))
										<span class="badge">{{ count(Session::get('agregarProducto')) }}</span>
									@endif
								</a>
							</li>
							<li>
								<a href="{{ url('cuenta/logout') }}">
									<i class="fa fa-sign-out"></i> Salir
								</a>
							</li>
						@else
							<li>
								<a href="{{ url('cuenta/crear') }}">
									<i class="fa fa-cog"></i> Registrate
								</a>
							</li>
							<li>
								<a href="{{ url('cuenta/login') }}">
									<i class="fa fa-sign-in"></i> Ingresar
								</a>
							</li>
						@endif

					</ul>
				</div>
			</div>
		</div>
	</div>
</div>
