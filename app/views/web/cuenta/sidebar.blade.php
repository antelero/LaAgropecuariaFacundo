<a href="{{ url('cuenta/perfil') }}" class="btn btn-default btn-block menu-perfil-boton {{ (Request::is('cuenta/perfil') or Request::is('cuenta/perfil/editar')) ? 'active' : '' }}">
	<i class="fa fa-user"></i>
	<span>Perfil</span>
</a>
<a href="{{ url('cuenta/perfil/cambiar-password') }}" class="btn btn-default btn-block menu-perfil-boton {{ Request::is('cuenta/perfil/cambiar-password') ? 'active' : '' }}">
	<i class="fa fa-unlock-alt"></i>
	<span>Cambiar Contraseña</span>
</a>
<a href="{{ url('consulta') }}" class="btn btn-default btn-block menu-perfil-boton {{ Request::is('consulta') ? 'active' : '' }}">
	<i class="fa fa-unlock-alt"></i>
	<span>Consulta</span>
</a>