@extends('admin.layout.default')

@section('migasPan')
	<h1>
		Servicio <small>Mostrar</small>
	</h1>
	<ol class="breadcrumb">
		<li><a href="{{ url('admin') }}"><i class="fa fa-dashboard"></i> Inicio</a></li>
		<li><a href="{{ url('admin/servicio') }}"><i class="fa fa-glass"></i> Servicio</a></li>
		<li class="active">Mostrar</li>
	</ol>
@stop

@section('contenido')
<div class="row">
	<div class="col-md-8 col-md-offset-2">
		<div class="box box-info">
			<div class="box-header">
				<h3 class="box-title">Mostrar Servicio</h3>
			</div>

			<div class="box-body">
				<div class="row">
					<div class="col-md-8">
						<dl class="dl-horizontal">
							<dt>Codigo:</dt>
							<dd># {{ $servicio->id }}</dd>
							<dt>Nombre:</dt>
							<dd>{{ $servicio->nombre }}</dd>
							<dt>Detalle:</dt>
							<dd>
								<a class="btn btn-primary btn-xs" href="#" data-toggle="modal" data-target="#detalleModal">
									Click aquí
								</a>
							</dd>
							<dt>Precio:</dt>
							<dd>$ {{ $servicio->precio }}</dd>
						</dl>
					</div>
					<div class="col-md-4">
						@if (!empty($servicio->imagen))
							<img src="{{ asset('assets/imagen/servicio/' . $servicio->imagen) }}" class="img-thumbnail" alt="{{ $servicio->nombre }}">
						@else
							<img src="{{ asset('assets/admin/img/ImagenVino.jpg') }}" class="img-thumbnail" alt="Imagen Servicio">
						@endif
					</div>
				</div>

			</div>

			<div class="box-footer">
				<a href="{{ url('admin/producto/' . $producto->id . '/edit') }}" class="btn btn-warning">Editar</a>
				<a href="{{ url('admin/producto') }}" class="btn btn-danger">Cancelar</a>
			</div>

		</div>
	</div>
</div>

<!-- Modal -->
<div class="modal fade" id="detalleModal" tabindex="-1" role="dialog" aria-labelledby="detalleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="detalleModalLabel">Producto: <strong>"{{ $producto->nombre }}"</strong></h4>
			</div>
			<div class="modal-body">
				<p class="text-justify">
					{{ $producto->detalle }}
				</p>
				<p class="text-center">
					<img src="{{ asset('assets/imagen/producto/' . $producto->imagen) }}" class="img-thumbnail" alt="{{ $producto->nombre }}">
				</p>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>
			</div>
		</div>
	</div>
</div>
@stop
