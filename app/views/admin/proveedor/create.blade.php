@extends('admin.layout.default')

@section('migasPan')
	<h1>
		Proveedor <small>Crear</small>
	</h1>
	<ol class="breadcrumb">
		<li><a href="{{ url('admin') }}"><i class="fa fa-dashboard"></i> Inicio</a></li>
		<li><a href="{{ url('admin/proveedor') }}"><i class="fa fa-glass"></i> Proveedor</a></li>
		<li class="active">Crear</li>
	</ol>
@stop

@section('contenido')
<div class="row">
	<div class="col-md-6 col-md-offset-3">
		<div class="box box-info">
			<div class="box-header">
				<h3 class="box-title">Crear Proveedor</h3>
			</div>

			{{ Form::open(array('url' => 'admin/proveedor', 'method' => 'POST', 'role' => 'form', 'files' => true)) }}
				<div class="box-body">

					@include('admin.layout.mensaje')

					<div class="form-group">
						{{ Form::label('nombre', 'Nombre del Proveedor') }}
						{{ Form::text('nombre', null, array('class' => 'form-control', 'placeholder' => 'Ingrese el nombre del proveedor')) }}
					</div>

					<div class="form-group">
						{{ Form::label('detalle', 'Detalle del Proveedor') }}
						{{ Form::textarea('detalle', null, array('class' => 'form-control', 'placeholder' => 'Ingrese la detalle del proveedor', 'rows' => '5')) }}
					</div>

					<div class="form-group">
						{{ Form::label('email', 'E-Mail') }}
						{{ Form::email('email', null, array('class' => 'form-control', 'placeholder' => 'Ingrese el email del proveedor')) }}
					</div>

					<div class="form-group">
						{{ Form::label('direccion', 'Direccion del Proveedor') }}
						{{ Form::text('direccion', null, array('class' => 'form-control', 'placeholder' => 'Ingrese la direccion del proveedor')) }}
					</div>

					<div class="form-group">
						{{ Form::label('telefono', 'Telefono del Proveedor') }}
						{{ Form::text('telefono', null, array('class' => 'form-control', 'placeholder' => 'Ingrese el telefono del proveedor')) }}
					</div>

					<div class="form-group">
						<div class="row">
							<div class="col-md-7">
								{{ Form::label('imagen', 'Imagen del Proveedor') }}
								{{ Form::file('imagen', array('onchange' => 'mostrarImagen();')) }}
								<p class="help-block">Seleccione la Imagen del Proveedor</p>
							</div>
							<div class="col-md-5">
								<img id="imagenLogo" src="{{ asset('assets/admin/img/ImagenVino.jpg') }}" class="img-thumbnail" alt="Imagen Producto">
							</div>
						</div>
					</div>
				</div>

				<div class="box-footer">
					<input class="btn btn-success" type="submit" value="Guardar">
					<a href="{{ url('admin/proveedor') }}" class="btn btn-danger">Cancelar</a>
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
