@extends('web.layout.default')

@section('contenido')

	<div class="row">
		<div class="col-sm-3">
			<div class="menu-perfil">
				@include('web.cuenta.sidebar')
			</div>
		</div>

		<div class="col-sm-9 padding-right">
			<h3 class="text-center">
				Hola <strong>{{ Auth::user()->nombre_completo }}</strong>, aqui podras encontrar toda tu informacion
			</h3>
		</div>
	</div>

@stop