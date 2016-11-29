@extends('admin.layout.default')

@section('migasPan')
	<h1>
		Tipo de Producto <small>Crear</small>
	</h1>
	<ol class="breadcrumb">
		<li><a href="{{ url('admin') }}"><i class="fa fa-dashboard"></i> Inicio</a></li>
		<li><a href="{{ url('admin/tipo-vino') }}"><i class="fa fa-glass"></i> Tipo de Producto</a></li>
		<li class="active">Crear</li>
	</ol>
@stop

@section('contenido')
<div class="row">
	<div class="col-md-6 col-md-offset-3">
		<div class="box box-info">
			<div class="box-header">
				<h3 class="box-title">Crear Tipo de Producto</h3>
			</div>

			{{ Form::open(array('url' => 'admin/tipo-producto', 'method' => 'POST', 'role' => 'form')) }}
				<div class="box-body">

					@include('admin.layout.mensaje')

					<div class="form-group">
						{{ Form::label('nombre', 'Nombre del Tipo de Producto') }}
						{{ Form::text('nombre', null, array('class' => 'form-control', 'placeholder' => 'Ingrese el nombre del tipo de producto')) }}
					</div>
				</div>

				<div class="box-footer">
					<input class="btn btn-success" type="submit" value="Guardar">
					<a href="{{ url('admin/tipo-producto') }}" class="btn btn-danger">Cancelar</a>
				</div>
			{{ Form::close() }}

		</div>
	</div>
</div>
@stop
