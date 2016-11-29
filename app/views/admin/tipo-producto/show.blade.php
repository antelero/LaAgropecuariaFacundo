@extends('admin.layout.default')

@section('migasPan')
	<h1>
		Tipo de Producto <small>Mostrar</small>
	</h1>
	<ol class="breadcrumb">
		<li><a href="{{ url('admin') }}"><i class="fa fa-dashboard"></i> Inicio</a></li>
		<li><a href="{{ url('admin/tipo-producto') }}"><i class="fa fa-glass"></i> Tipo de Producto</a></li>
		<li class="active">Mostrar</li>
	</ol>
@stop

@section('contenido')
<div class="row">
	<div class="col-md-6 col-md-offset-3">
		<div class="box box-info">
			<div class="box-header">
				<h3 class="box-title">Mostrar Tipo de Producto</h3>
			</div>

			<div class="box-body">
				<h2># {{ $tipoProducto->id }} - {{ $tipoProducto->nombre }}</h2>
			</div>

			<div class="box-footer">
				<a href="{{ url('admin/tipo-producto/' . $tipoProducto->id . '/edit') }}" class="btn btn-warning">Editar</a>
				<a href="{{ url('admin/tipo-producto') }}" class="btn btn-danger">Cancelar</a>
			</div>

		</div>
	</div>
</div>
@stop
