@extends('admin.layout.default')

@section('migasPan')
	<h1>
		Provincia <small>Mostrar</small>
	</h1>
	<ol class="breadcrumb">
		<li><a href="{{ url('admin') }}"><i class="fa fa-dashboard"></i> Inicio</a></li>
		<li><a href="{{ url('admin/provincia') }}"><i class="fa fa-globe"></i> Provincia</a></li>
		<li class="active">Mostrar</li>
	</ol>
@stop

@section('contenido')
<div class="row">
	<div class="col-md-6 col-md-offset-3">
		<div class="box box-info">
			<div class="box-header">
				<h3 class="box-title">Mostrar Provincia</h3>
			</div>

			<div class="box-body">
				<h2># {{ $provincia->id }} - {{ $provincia->nombre }}</h2>
			</div>

			<div class="box-footer">
				<a href="{{ url('admin/provincia/' . $provincia->id . '/edit') }}" class="btn btn-warning">Editar</a>
				<a href="{{ url('admin/provincia') }}" class="btn btn-danger">Cancelar</a>
			</div>

		</div>
	</div>
</div>
@stop