<aside class="left-side sidebar-offcanvas">
	<section class="sidebar">
		<div class="user-panel">
			<div class="pull-left image">
				@if (Auth::user()->avatar)
					<img src="{{ asset('assets/imagen/usuario/' . Auth::user()->avatar) }}" class="img-circle" alt="Imagen Usuario">
				@else
					<img src="{{ asset('assets/admin/img/AvatarUsuario.jpg') }}" class="img-circle" alt="Imagen Usuario">
				@endif
			</div>
			<div class="pull-left info">
				<p>Hola, {{ Auth::user()->nombre }}</p>

				<a href="#"><i class="fa fa-circle text-success"></i> En Linea</a>
			</div>
		</div>
		<form action="#" method="get" class="sidebar-form">
			<div class="input-group">
				<input type="text" name="q" class="form-control" placeholder="Buscar..."/>
				<span class="input-group-btn">
					<button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
				</span>
			</div>
		</form>
		<ul class="sidebar-menu">
		@if (Auth::user()->tipo == 'admin')
			<li class="{{ Request::is('admin') ? 'active' : '' }}">
				<a href="{{ url('admin') }}">
					<i class="fa fa-home"></i> <span>Inicio</span>
				</a>
			</li>
			<li class="{{ Request::is('admin/usuario*') ? 'active' : '' }}">
				<a href="{{ url('admin/usuario') }}">
					<i class="fa fa-hand-o-up"></i> <span>Usuario y Cliente</span>
				</a>
			</li>
			<li class="{{ Request::is('admin/provincia*') ? 'active' : '' }}">
				<a href="{{ url('admin/provincia') }}">
					<i class="fa fa-globe"></i> <span>Provincia</span>
				</a>
			</li>

			<li class="{{ Request::is('admin/tipo-producto*') ? 'active' : '' }}">
				<a href="{{ url('admin/tipo-producto') }}">
					<i class="fa fa-glass"></i> <span>Tipo de Producto</span>
				</a>
			</li>

			<li class="{{ Request::is('admin/producto-servicio*') ? 'active' : '' }}">
				<a href="{{ url('admin/producto-servicio') }}">
					<i class="fa fa-archive"></i> <span>Producto</span>
				</a>
			</li>
			<li class="{{ Request::is('admin/proveedor*') ? 'active' : '' }}">
				<a href="{{ url('admin/proveedor') }}">
					<i class="fa fa-group"></i> <span>Proveedor</span>
				</a>
			</li>
			<li class="{{ Request::is('admin/consulta*') ? 'active' : '' }}">
				<a href="{{ url('admin/consulta') }}">
					<i class="fa fa-group"></i> <span>Consulta</span>
				</a>
			</li>
			<li class="{{ Request::is('admin/orden-compra*') ? 'active' : '' }}">
				<a href="{{ url('admin/orden-compra') }}">
					<i class="fa fa-group"></i> <span>Orden de Compra</span>
				</a>
			</li>
			<li class="{{ Request::is('admin/publicidad*') ? 'active' : '' }}">
				<a href="{{ url('admin/publicidad') }}">
					<i class="fa fa-group"></i> <span>Publicidad</span>
				</a>
			</li>
			</li>
			<li class="{{ Request::is('admin/nota-pedido*') ? 'active' : '' }}">
				<a href="{{ url('admin/nota-pedido') }}">
					<i class="fa fa-group"></i> <span>Nota de Pedido</span>
				</a>
			</li>
		@elseif (Auth::user()->tipo == 'usuario')
			<li class="{{ Request::is('admin') ? 'active' : '' }}">
				<a href="{{ url('admin') }}">
					<i class="fa fa-home"></i> <span>Inicio</span>
				</a>
			</li>
			<li class="{{ Request::is('admin/usuario*') ? 'active' : '' }}">
				<a href="{{ url('admin/usuario') }}">
					<i class="fa fa-hand-o-up"></i> <span>Usuario y Cliente</span>
				</a>
			</li>

			<li class="{{ Request::is('admin/producto-servicio*') ? 'active' : '' }}">
				<a href="{{ url('admin/producto-servicio') }}">
					<i class="fa fa-archive"></i> <span>Producto</span>
				</a>
			</li>
			<li class="{{ Request::is('admin/proveedor*') ? 'active' : '' }}">
				<a href="{{ url('admin/proveedor') }}">
					<i class="fa fa-group"></i> <span>Proveedor</span>
				</a>
			</li>
			<li class="{{ Request::is('admin/consulta*') ? 'active' : '' }}">
				<a href="{{ url('admin/consulta') }}">
					<i class="fa fa-group"></i> <span>Consulta</span>
				</a>
			</li>
			<li class="{{ Request::is('admin/orden-compra*') ? 'active' : '' }}">
				<a href="{{ url('admin/orden-compra') }}">
					<i class="fa fa-group"></i> <span>Orden de Compra</span>
				</a>
			</li>
			<li class="{{ Request::is('admin/nota-pedido*') ? 'active' : '' }}">
				<a href="{{ url('admin/nota-pedido') }}">
					<i class="fa fa-group"></i> <span>Nota de Pedido</span>
				</a>
			</li>
		@endif
		</ul>
	</section>
</aside>
