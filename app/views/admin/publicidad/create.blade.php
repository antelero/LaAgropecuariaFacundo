@extends('admin.layout.default')

@section('migasPan')
	<h1>
		Publicidad <small>Crear</small>
	</h1>
	<ol class="breadcrumb">
		<li><a href="{{ url('admin') }}"><i class="fa fa-dashboard"></i> Inicio</a></li>
		<li><a href="{{ url('admin/publicidad') }}"><i class="fa fa-glass"></i> Publicidad</a></li>
		<li class="active">Crear</li>
	</ol>
@stop

@section('contenido')
<div class="row">
	<div class="col-md-6 col-md-offset-3">
		<div class="box box-info">
			<div class="box-header">
				<h3 class="box-title">Crear Publicidad</h3>
			</div>

			{{ Form::open(array('url' => 'admin/publicidad', 'method' => 'POST', 'role' => 'form', 'files' => true)) }}
				<div class="box-body">

					@include('admin.layout.mensaje')

					<div class="form-group">
						{{ Form::label('nombre', 'Nombre de la Publicidad') }}
						{{ Form::text('nombre', null, array('class' => 'form-control', 'placeholder' => 'Ingrese el nombre de la publicidad')) }}
					</div>

					<div class="form-group">
						{{ Form::label('detalle', 'Detalle de la Publicidad') }}
						{{ Form::textarea('detalle', null, array('class' => 'form-control', 'placeholder' => 'Ingrese el detalle de la publicidad', 'rows' => '5')) }}
					</div>

					<div class="form-group">
						{{ Form::label('ubicacion', 'Ubicacion de la Publicidad') }}
						{{ Form::select('ubicacion', array('' => 'Seleccione la ubicacion de la publicidad', 'primer' => 'Primer Lugar', 'segundo' => 'Segundo Lugar', 'tercer' => 'Tercer Lugar', 'cuarto' => 'Cuarto Lugar', 'quinto' => 'Quinto Lugar', 'sexto' => 'Sexto Lugar', 'septimo' => 'Septimo Lugar', 'octavo' => 'Octavo Lugar', 'ningun' => 'Ningun Lugar'), null, array('class' => 'form-control', 'style' => 'width:290px')) }}
					</div>

					<div class="form-group">
						{{ Form::label('link', 'Link de la Publicidad') }}
						{{ Form::text('link', null, array('class' => 'form-control', 'placeholder' => 'Ingrese la pagina web')) }}
					</div>

					<div class="form-group">
						<div class="row">
							<div class="col-md-7">
								{{ Form::label('imagen', 'Imagen de la Publicidad') }}
								{{ Form::file('imagen', array('onchange' => 'mostrarImagen();')) }}
								<p class="help-block">Seleccione la Imagen de la Publicidad</p>
							</div>
							<div class="col-md-5">
								<img id="imagenLogo" src="{{ asset('assets/admin/img/ImagenVino.jpg') }}" class="img-thumbnail" alt="Imagen Producto">
							</div>
						</div>
					</div>
				</div>

				<div class="box-footer">
					<input class="btn btn-success" type="submit" value="Guardar">
					<a href="{{ url('admin/publicidad') }}" class="btn btn-danger">Cancelar</a>
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
