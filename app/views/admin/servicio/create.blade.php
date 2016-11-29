@extends('admin.layout.default')

@section('migasPan')
	<h1>
		Producto <small>Crear</small>
	</h1>
	<ol class="breadcrumb">
		<li><a href="{{ url('admin') }}"><i class="fa fa-dashboard"></i> Inicio</a></li>
		<li><a href="{{ url('admin/producto') }}"><i class="fa fa-glass"></i> Producto</a></li>
		<li class="active">Crear</li>
	</ol>
@stop

@section('contenido')
<div class="row">
	<div class="col-md-6 col-md-offset-3">
		<div class="box box-info">
			<div class="box-header">
				<h3 class="box-title">Crear Producto</h3>
			</div>

			{{ Form::open(array('url' => 'admin/producto', 'method' => 'POST', 'role' => 'form', 'files' => true)) }}
				<div class="box-body">

					@include('admin.layout.mensaje')

					<div class="form-group">
						{{ Form::label('nombre', 'Nombre del Producto') }}
						{{ Form::text('nombre', null, array('class' => 'form-control', 'placeholder' => 'Ingrese el nombre del producto')) }}
					</div>
					<div class="form-group">
						{{ Form::label('idTipoProducto', 'Tipo de Producto') }}
						{{ Form::select('idTipoProducto', $tipoProducto, null, array('class' => 'form-control')) }}
					</div>
					<div class="form-group">
						{{ Form::label('detalle', 'Detalle del Producto') }}
						{{ Form::textarea('detalle', null, array('class' => 'form-control', 'placeholder' => 'Ingrese la detalle del producto', 'rows' => '5')) }}
					</div>
					<div class="form-group">
						{{ Form::label('cantidad', 'Cantidad de Producto') }}
						{{ Form::number('cantidad', null, array('min' => '1', 'max' => '99', 'class' => 'form-control', 'placeholder' => 'Ingrese la cantidad del producto')) }}
					</div>
					<div class="form-group">
						{{ Form::label('precio', 'Precio del Producto') }}
						{{ Form::text('precio', null, array('class' => 'form-control', 'placeholder' => 'Ingrese el precio del producto')) }}
					</div>

					<div class="form-group">
						<div class="row">
							<div class="col-md-7">
								{{ Form::label('imagen', 'Imagen del Producto') }}
								{{ Form::file('imagen', array('onchange' => 'mostrarImagen();')) }}
								<p class="help-block">Seleccione la Imagen del Producto</p>
							</div>
							<div class="col-md-5">
								<img id="imagenLogo" src="{{ asset('assets/admin/img/ImagenVino.jpg') }}" class="img-thumbnail" alt="Imagen Producto">
							</div>
						</div>
					</div>
				</div>

				<div class="box-footer">
					<input class="btn btn-success" type="submit" value="Guardar">
					<a href="{{ url('admin/producto') }}" class="btn btn-danger">Cancelar</a>
				</div>
			{{ Form::close() }}

		</div>
	</div>
</div>
@stop

@section('script')
<script>
	function mostrarImagen() {
		var oFReader = new FileReader();
		oFReader.readAsDataURL(document.getElementById('imagen').files[0]);

		oFReader.onload = function (oFREvent) {
			document.getElementById('imagenLogo').src = oFREvent.target.result;
		};
	};
</script>
@stop
