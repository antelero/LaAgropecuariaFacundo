<header class="header">
	<a href="index.html" class="logo">
		La Agropecuaria
	</a>

	<nav class="navbar navbar-static-top" role="navigation">
		<a href="#" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button">
			<span class="sr-only">Toggle navigation</span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		</a>
		<div class="navbar-right">
			<ul class="nav navbar-nav">
				<li class="dropdown user user-menu">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">
						<i class="glyphicon glyphicon-user"></i>
						<span>{{ Auth::user()->nombre_completo }} <i class="caret"></i></span>
					</a>
					<ul class="dropdown-menu">
						<li class="user-header bg-light-blue">
							@if (Auth::user()->avatar)
								<img src="{{ asset('assets/imagen/usuario/' . Auth::user()->avatar) }}" class="img-circle" alt="Imagen Usuario">
							@else
								<img src="{{ asset('assets/admin/img/AvatarUsuario.jpg') }}" class="img-circle" alt="Imagen Usuario">
							@endif
							<p>
								{{ Auth::user()->nombre_completo }} - {{ Auth::user()->tipo_usuario }}
								<small>Miembro desde: {{ Carbon::parse(Auth::user()->created_at)->toFormattedDateString() }}</small>
							</p>
						</li>

						<li class="user-footer">
							<div class="pull-left">
								<a href="{{ url('admin/perfil') }}" class="btn btn-default btn-flat">Perfil</a>
							</div>
							<div class="pull-right">
								<a href="{{ url('admin/logout') }}" class="btn btn-default btn-flat">Salir</a>
							</div>
						</li>
					</ul>
				</li>
			</ul>
		</div>
	</nav>
</header>
